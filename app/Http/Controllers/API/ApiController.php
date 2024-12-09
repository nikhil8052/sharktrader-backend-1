<?php

namespace App\Http\Controllers\API;
// ini_set('max_execution_time', 0); // No time limit

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListStrategy;
use App\Models\Shark;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use App\Http\Requests\BuySharkRequest;
use App\Services\UpdateUserAmountService;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use App\Models\QuantTrade;
use App\Models\Wallet;
use App\Models\Team;
use Illuminate\Http\JsonResponse;
use App\Models\Strategy;
use Illuminate\Support\Carbon;
use App\Models\Rewards;
use App\Models\StrategyCryptoEarnins;
use App\Http\Controllers\ExchangeController;
use App\Services\CoinLayerClient;
use App\Services\CoinMarketCapClient;
use App\Services\CoinRankingClient;
use App\Services\CryptoCompareClient;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use App\Models\Transfer;
use PrevailExcel\Nowpayments\Facades\Nowpayments;
use Log;
use Exception;
use App\Services\TransferService;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return failedResponse($validator->errors(), "Operation Failed.");
        }

        // Check if the credentials are correct
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Generate and return the token
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->plainTextToken;

            $data = [
                'token' => $token,
                'user' => $user,
            ];
            return successResponse($data);
        } else {
            return response()->json(
                [
                    'error' => 'Unauthorized',
                ],
                401
            );
        }
    }

    public function getAllStrategies()
    {
        // Fetch all strategies
        $strategies = ListStrategy::all();

        // Return strategies as JSON response
        return successResponse($strategies);
    }

    public function spiderWeb(Request $request)
    {
        $user = $request->user();
        // Get the user's sharks, filtering by the ones that are present
        $present = $user->sharks->filter(function ($shark) {
            return $shark->pivot->present == true;
        });

        $data = [
            'sharks' => Shark::all(), // All sharks associated with the user
            'present' => $present->first(), // The first present shark
            'user' => $user, // The authenticated user
        ];

        return successResponse($data);
    }

    public function spiderWebBuy(Request $request, UpdateUserAmountService $updateUserAmountService)
    {
        $user = Auth::user();
        if (!$user) {
            return failedResponse([], "User not authenticated.");
        }

        $request->merge([
            'shark_id' => $request->id,
            'one_time_password' => $request->otp,
        ]);

        // Manually construct the data to validate
        $requestData = [
            'shark_id' => $request->input('shark_id'),
            'one_time_password' => $request->input('one_time_password'),
            'cost' => $request->input('cost'),
            'duration' => $request->input('duration'),
        ];

        // Validate the request data manually using the rules from BuySharkRequest
        $validator = \Validator::make($requestData, [
            'shark_id' => 'integer|required',
            'one_time_password' => 'integer|required',
            'cost' => 'numeric|required',
            'duration' => 'integer|required',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return failedResponse($validator->errors(), "Validation failed.");
        }

        // Verify OTP using Authenticator
        $authenticator = app(Authenticator::class);
        if (!$authenticator->verify($requestData['one_time_password'], $user->google2fa_secret)) {
            return failedResponse([], "OTP verification failed.");
        }

        // Call the UpdateUserAmountService with validated data
        $result = $updateUserAmountService->handle($validator->validated());

        return successResponse($result);
    }

    public function setup2fa(Request $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $user = $request->user(); // Assuming API authentication
        if (!$user) {
            return failedResponse([]);
        }

        // return session()->get('2fa_data');

        // Generate the 2FA secret key
        $google2faSecret = $google2fa->generateSecretKey();

        // Prepare registration data
        $registrationData = [
            'google2fa_secret' => $google2faSecret,
            'email' => $user->email,
        ];

        session()->put('2fa_data', $registrationData);

        // Generate the QR code
        $qrCode = $google2fa->getQRCodeInline(
            'Shark', // Replace with your app's name
            $registrationData['email'],
            $registrationData['google2fa_secret']
        );

        $data = [
            'message' => '2FA setup initiated',
            'qr_code' => $qrCode,
            'secret' => $registrationData['google2fa_secret'],
        ];

        return successResponse($data);
    }

    public function update2fa(Request $request)
    {
        $google2fa = new Google2FA();
        // Get session data
        $input = session()->get('2fa_data');
        $user = auth()->user();
        // Validate OTP
        $otp = $request->input('otp');
        $isOtpValid = $google2fa->verifyKey($request->google2fa_secret, $otp);
        if (!$isOtpValid) {
            return failedResponse([], "Invalid OTP. Please try again.");
        }
        // Update user's 2FA secret
        $user->google2fa_secret = $request->google2fa_secret;
        $user->save();
        $data = [
            'user' => $user,
        ];

        return successResponse($data, '2FA updated successfully.');
    }

    public function getQuantTrades()
    {
        // Fetch all records from the QuantTrade model
        $quants = QuantTrade::all();

        return successResponse($quants);
    }

    public function getQuantTradesShow(QuantTrade $quantTrade)
    {
        // Get the authenticated user's sharks
        $userSharks = Auth::user()->sharks;

        // Filter the sharks to get only the active ones
        $quantiqFox = $userSharks->filter(function ($shark) {
            return $shark->pivot->active;
        });

        $data = [
            'success' => true,
            'quantiqFox' => $quantiqFox,
            'wallet' => Auth::user()->wallet,
            'quantTrade' => $quantTrade,
        ];

        // Return the data as JSON response
        return successResponse($data);
    }

    public function getUserStrategies()
    {
        $user = Auth::user();

        // Group strategies by their status
        $strategiesGroupedByStatus = $user->strategies->groupBy('status');

        // Fetch strategies based on their status
        $workingStrategies = Strategy::where('user_id', $user->id)
            ->where('status', 'active')
            ->orderBy('updated_at', 'desc')
            ->get();

        $finishedStrategies = Strategy::where('user_id', $user->id)
            ->where('status', 'finished')
            ->orderBy('updated_at', 'desc')
            ->get();

        $data['workingStrategies'] = $workingStrategies;
        $data['finishedStrategies'] = $finishedStrategies;

        return successResponse($data);
    }

    public function getStrategyDetails($strategyId): JsonResponse
    {
        $strategy = Strategy::where('order_id', $strategyId)->first();

        if (!$strategy || $strategy->user_id != Auth::id()) {
            return failedResponse("Not found");
        }

        if ($strategy->status == 'active') {
            $investmentAmount = $strategy->amount;
            $rewardAmount = 0;

            // Calculate reward amount
            if ($investmentAmount >= 20 && $investmentAmount <= 100) {
                $rewardAmount = 0.05;
            } elseif ($investmentAmount >= 101 && $investmentAmount <= 300) {
                $rewardAmount = 0.12;
            } elseif ($investmentAmount >= 301 && $investmentAmount <= 600) {
                $rewardAmount = 0.17;
            } elseif ($investmentAmount >= 601) {
                $rewardAmount = 0.225;
            }

            // Handle rewards
            $reward = Rewards::where('user_id', Auth::id())->first();

            if (!$reward) {
                $reward = new Rewards([
                    'user_id' => Auth::id(),
                    'next_claim' => Carbon::now()->addHours(4),
                    'amount' => $rewardAmount,
                ]);
                $reward->save();
            } else {
                $reward->amount = $rewardAmount;
                $reward->save();
            }

            $data = [
                'strategy' => $strategy,
                'reward' => $reward,
                'created' => $strategy->created_at->format('Y-m-d H:i:s'),
            ];

            return successResponse($data);
        }

        // Handle finished strategies
        $cryptos = [
            'btc' => random_int(0, 100),
            'sol' => random_int(0, 100),
            'etc' => random_int(0, 100),
            'link' => random_int(0, 100),
            'eth' => random_int(0, 100),
            'ada' => random_int(0, 100),
        ];

        $totalNo = array_sum($cryptos);

        $earnings = StrategyCryptoEarnins::where('strategy_id', $strategy->id)->first();

        if (!$earnings) {
            $earnings = StrategyCryptoEarnins::create([
                'btc' => ($cryptos['btc'] / $totalNo) * 100,
                'sol' => ($cryptos['sol'] / $totalNo) * 100,
                'etc' => ($cryptos['etc'] / $totalNo) * 100,
                'link' => ($cryptos['link'] / $totalNo) * 100,
                'eth' => ($cryptos['eth'] / $totalNo) * 100,
                'ada' => ($cryptos['ada'] / $totalNo) * 100,
                'strategy_id' => $strategy->id,
            ]);
        }

        $data = [
            'strategy' => $strategy,
            'earnings' => [
                'btc' => $earnings->btc,
                'sol' => $earnings->sol,
                'etc' => $earnings->etc,
                'link' => $earnings->link,
                'eth' => $earnings->eth,
                'ada' => $earnings->ada,
            ],
            'created' => $strategy->created_at->format('Y-m-d H:i:s'),
        ];

        return successResponse($data);
    }

    public function getExchangeData()
    {
        $levels = [
            1 => 'Binance',
            2 => 'Kraken',
            3 => 'Gemini',
            4 => 'Bithumb',
        ];

        $crypto_currencies = ['BTC', 'ETH', 'USDT', 'XRP', 'SOL', 'ADA', 'DOT', 'LINK', 'AVAX', 'ETC'];

        $data = [
            'levels' => $levels,
            'crypto_currencies' => $crypto_currencies,
        ];

        return successResponse($data);
    }

    public function getUserMenuData()
    {
        $user = User::with('wallet')->find(auth()->id());

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $data = [
            'user' => $user,
            'wallet' => $user->wallet,
        ];

        return successResponse($data);
    }

    public function getWallet()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Log out Google 2FA
        \Google2FA::logout();

        $data = [
            'wallet' => $user->wallet,
            'phoneNumber' => $user->phone_number,
        ];

        return successResponse($data);
    }

    public function getProfile()
    {
        $user = Auth::user();

        if (!$user) {
            return failedResponse("Not found ");
        }

        $date = Carbon::parse($user->created_at)->format('d-F-Y');
        $user->joined = $date;

        $data = [
            'user' => $user,
            'wallet'=>$user->wallet
        ];
        return successResponse($data);
    }

    public function updateProfile(Request $req)
    {
        $user = Auth::user();

        if (!$user) {
            return failedResponse("User not found.");
        }

        // Validation rules
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update user details
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        $user->save();

        return successResponse($user);
    }

    public function invite()
    {
        // Fetch the referral code from the authenticated user
        $referral_code = Auth::user()->referral_code;

        // Return the referral code as a JSON response
        $data = [
            'referral_code' => $referral_code,
        ];
        return successResponse($data);
    }

    function getCoins()
    {
        $url = 'https://api.coinranking.com/v2/coins';
        return callApi($url, 'GET');
    }

    public function getCryptoList(Request $request)
    {
        try {
            $levels = ExchangeController::$levels;
            $crypto_currencies = ExchangeController::$crypto_currencies;
            $cryptoList = [];

            if (isset($levels[$request->market])) {
                switch ($levels[$request->market]) {
                    case 'Binance':
                        $data = (new CoinMarketCapClient('latest'))->rates();
                        foreach ($data['data'] as $crypto) {
                            if (in_array($crypto['symbol'], $crypto_currencies)) {
                                foreach ($crypto['quote'] as $quote) {
                                    $cryptoList[$crypto['symbol']] = $quote['price'];
                                }
                            }
                        }
                        break;
                    case 'Kraken':
                        $data = (new CryptoCompareClient('pricemulti', $crypto_currencies, 'USDT'))->rates();
                        foreach ($data as $cryptoKey => $crypto) {
                            if (in_array($cryptoKey, $crypto_currencies)) {
                                $cryptoList[$cryptoKey] = $crypto['USDT'];
                            }
                        }
                        break;
                    case 'Gemini':
                        $data = (new CoinLayerClient('live', $crypto_currencies))->rates();
                        foreach ($data['rates'] as $cryptoKey => $crypto) {
                            if (in_array($cryptoKey, $crypto_currencies)) {
                                $cryptoList[$cryptoKey] = $crypto;
                            }
                        }
                        break;
                    case 'Bithumb':
                        $data = (new CoinRankingClient('coins', $crypto_currencies))->rates();
                        if (isset($data['data']['coins'])) {
                            foreach ($data['data']['coins'] as $crypto) {
                                if (in_array($crypto['symbol'], $crypto_currencies) && !is_null($crypto['price'])) {
                                    $cryptoList[$crypto['symbol']] = $crypto['price'];
                                }
                            }
                        }
                        break;
                    default:
                        $cryptoList = [];
                }
            }

            $data = [
                'list' => $cryptoList,
            ];
            return successResponse($data);
        } catch (\Exception $e) {
            // Handle errors here
            return response()->json(['error' => 'An error occurred while fetching cryptocurrency data.'], 500);
        }
    }

    public function updatePaymentPassword(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return failedResponse([], "User not authenticated.");
        }

        $request->validate([
            'currentPaymentPassword' => 'required|string',
            'newPaymentPassword' => 'required|string',
            'repeatNewPaymentPassword' => 'required|string|same:newPaymentPassword',
            'otpCode' => 'required|string',
        ]);

        $authenticator = app(Authenticator::class);
        // Verify OTP using Authenticator
        if (!$authenticator->verify($request->otpCode, $user->google2fa_secret)) {
            return failedResponse([], "OTP verification failed.");
        }

        if ($user->payment_password !== $request->currentPaymentPassword) {
            return failedResponse([], "Current payment password is incorrect.");
        }

        $user->payment_password = $request->newPaymentPassword;
        $user->save();

        return successResponse([], "Payment password updated successfully.");
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return failedResponse([], "User not authenticated.");
        }

        // Validate request
        $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string', // Ensure minimum length for new password
            'repeatNewPassword' => 'required|string|same:newPassword',
            'otpCode' => 'required|string',
        ]);

        $authenticator = app(Authenticator::class);

        // Verify OTP using Authenticator
        if (!$authenticator->verify($request->otpCode, $user->google2fa_secret)) {
            return failedResponse([], "OTP verification failed.");
        }

        // Check if the current password matches the one in the database
        if (!Hash::check($request->currentPassword, $user->password)) {
            return failedResponse([], "Current password is incorrect.");
        }

        // Update the user's password with the new hashed password
        $user->password = bcrypt($request->newPassword);
        $user->save();

        return successResponse([], "Password updated successfully.");
    }

    public function getMyTeam()
    {
        $levels = [];
        $user = Auth::user();

        if (!$user) {
            return response()->json(
                [
                    'code' => 401,
                    'message' => 'Unauthorized access. Please log in.',
                ],
                401
            );
        }

        $myTeam = $user->teams->where('referral_code', $user->referral_code)->first();
        $myTeamUsers = [];

        if ($myTeam) {
            $myTeamUsers = $myTeam
                ->descendantsAndSelf()
                ->depthFirst()
                ->get();

            $myTeamUsers->each(function ($team) use (&$levels) {
                $strategy = Strategy::where('user_id', $team->id)
                    ->where('status', '=', 'active')
                    ->first();
                $user = User::where('id', $team->id)
                    ->where('active_status', '=', 'active')
                    ->first();

                if ($user) {
                    $user->created_date = $user->created_at && $user->created_at != '' ? Carbon::createFromDate($user->created_at)->format('d-m-Y') : '';

                    $strategyAmount = Strategy::where('user_id', $team->id)
                        ->where('status', '=', 'active')
                        ->sum('amount');

                    $wallet = Wallet::where('user_id', $team->id)->first();

                    $team->balance = $wallet ? $wallet->amount + $strategyAmount : null;
                    $team->strategy = $strategy;
                    $team->user = $user;

                    $levels[$team->depth][] = $team;
                }
            });
        }
        $data = [
            'user' => $user,
            'myTeam' => $myTeam,
            'levels' => $levels,
        ];

        return successResponse($data);
    }

    public function claimCommission(Team $team)
    {
        try {
            $user = Auth::user();

            // Check if there is any commission to claim
            if ($team->received_commission == 0) {
                return failedResponse([], 'Refer your friends to accumulate commission!');
            }

            // Update user's wallet
            $user->wallet->update([
                'amount' => $user->wallet->amount + $team->received_commission,
            ]);

            // Reset received commission in the team
            $team->update([
                'received_commission' => 0,
            ]);

            return successResponse([], 'Successfully received the commission!');
        } catch (Exception $exception) {
            return failedResponse([], $exception->getMessage());
        }
    }

    protected function updatePayments($payment_id)
    {
        $nowpayments = Nowpayments::getPaymentStatus($payment_id);
        if ($nowpayments) {
            $payment_id = $nowpayments['payment_id'];
            $transaction = Transaction::where('payment_id', $payment_id)->first();
            if ($transaction) {
                $transaction->update($nowpayments);
            } else {
                $nowpayments['user_id'] = \auth()->id();
                $user = \auth()->user();
                $deposit = Deposit::create([
                    'user_id' => $user->id,
                    'transaction_id' => $transaction['id'],
                    'wallet_id' => $user->wallet->id,
                    'amount' => $nowpayments['price_amount'],
                    'description' => config('app.name') . ' Deposit',
                    'type' => $nowpayments['pay_currency'],
                    'status' => 'Pending',
                    'available_until' => now(),
                ]);
                $data['value_coin'] = $nowpayments['price_amount'];
                if ($nowpayments['payment_status'] == 'finished') {
                    SuccessfulDeposit::dispatch($deposit, $data);
                }
            }
        }
    }

    public function depositIndex(Request $request)
    {
        try {
            $user = Auth::user(); // Get the authenticated user
            $transactionExists = $user
                ->transactions()
                ->waiting()
                ->first(); // Check if a waiting transaction exists

            if ($transactionExists) {
                $valid_until = Carbon::createFromDate($transactionExists->valid_until);

                // If the transaction is expired, cancel it
                if ($valid_until->isPast()) {
                    $transactionExists->payment_status = 'canceled';
                    $transactionExists->save();
                } else {
                    // If the transaction is still valid, update the payment status
                    $this->updatePayments($transactionExists->payment_id);
                }
            }

            // Prepare the response data
            $data = [
                'wallet' => $user->wallet,
                'transactionExists' => $transactionExists,
            ];

            return successResponse($data, 'Transaction updated successfully.');
        } catch (Exception $exception) {
            // Return an error response with the exception message
            return errorResponse([], $exception->getMessage());
        }
    }

    public function depositAdd(Request $request)
    {
        try {
            // Validation logic
            $validator = Validator::make(
                $request->all(),
                [
                    'withdrawalAddress' => ['required', 'string'],
                    'amount' => ['required', 'numeric', 'min:20'],
                ],
                [
                    'withdrawalAddress.required' => 'The withdrawal address field is required.',
                    'withdrawalAddress.string' => 'The withdrawal address must be a valid string.',
                    'amount.required' => 'The amount field is required.',
                    'amount.numeric' => 'The amount must be a numeric value.',
                    'amount.min' => 'The amount must be at least 20.',
                ]
            );

            // Check if validation fails
            if ($validator->fails()) {
                return failedResponse($validator->errors());
            }

            // Proceed with your logic if validation passes
            $validatedData = $validator->validated();

            // Determine the payout currency and address
            $payoutCurrency = 'USDTTRC20';
            $payoutAddress = '';
            if ($validatedData['withdrawalAddress'] == 'trc20/usdt' || $validatedData['withdrawalAddress'] == 'TRC20/USDT') {
                $payoutCurrency = 'USDTTRC20';
                $payoutAddress = "TRFWgnLmTSvxvKaRs64nfZRQ6EL2nh3JFy";
            } elseif ($validatedData['withdrawalAddress'] == 'bep20/usdt' || $validatedData['withdrawalAddress'] == 'BEP20/USDT') {
                $payoutCurrency = 'USDTBEP20';
                $payoutAddress = "0x2fbe6eb1ebab9899da7959c50144d31a01c9f440";
            } elseif ($validatedData['withdrawalAddress'] == 'bsc/usdt' || $validatedData['withdrawalAddress'] == 'BSC/USDT') {
                $payoutCurrency = 'USDTBSC';
                $payoutAddress = "0x2fbe6eb1ebab9899da7959c50144d31a01c9f440";
            } else {
                return failedResponse([], 'Invalid withdrawal address.');
            }

            // Check for existing transactions
            $user = Auth::user();
            $transactionExists = $user
                ->transactions()
                ->waiting()
                ->first();

            if ($transactionExists) {
                $valid_until = Carbon::createFromDate($transactionExists->valid_until);
                if ($valid_until->isPast()) {
                    $transactionExists->payment_status = 'canceled';
                    $transactionExists->save();
                } else {
                    $data = [
                        'message' => 'Transaction already exists.',
                        'depositAmount' => $transactionExists->price_amount,
                        'payment_address' => $transactionExists->pay_address,
                        'payment_id' => $transactionExists->payment_id,
                        'available_until' => $valid_until->format('d-m-Y h:i:s A'),
                        'code' => 400,
                    ];

                    return $data;
                }
            }

            // Prepare payment data
            $payment_data = [
                'price_amount' => $validatedData['amount'],
                'price_currency' => 'usd',
                'pay_amount' => $validatedData['amount'],
                'pay_currency' => $payoutCurrency,
                'ipn_callback_url' => route('wallet.deposit.success.callback'),
                'order_id' => uniqid(),
                'order_description' => config('app.name') . ' Deposit',
                'case' => 'success',
            ];

            // Create transaction using NowPayments
            $transactionData = Nowpayments::createPayment($payment_data);
            $transactionData['user_id'] = Auth::id();

            if (isset($transactionData['expiration_estimate_date'])) {
                $transactionData['expiration_estimate_date'] = Carbon::createFromDate($transactionData['expiration_estimate_date'])->format('Y-m-d H:i:s');
            }

            $valid_until = now()
                ->addMinutes(20)
                ->format('Y-m-d H:i:s');
            if (isset($transactionData['valid_until'])) {
                $transactionData['valid_until'] = Carbon::createFromDate($transactionData['valid_until'])->format('Y-m-d H:i:s');
                $valid_until = Carbon::createFromDate($transactionData['valid_until'])->format('d-m-Y h:i:s A');
            }

            $transaction = Transaction::create($transactionData);

            return response()->json(
                [
                    'message' => 'Transaction created successfully.',
                    'depositAmount' => $transactionData['price_amount'] ?? 0,
                    'payment_id' => $transactionData['payment_id'],
                    'payment_address' => $transactionData['pay_address'],
                    'available_until' => $transactionData['valid_until'] ? $valid_until : '--',
                ],
                200
            );
        } catch (Exception $exception) {
            Log::error('Deposit Error: ' . $exception->getMessage());
            return response()->json(
                [
                    'message' => 'An error occurred during the deposit process.',
                    'error' => $exception->getMessage(),
                ],
                500
            );
        }
    }

    public function transfer(Request $request)
    {
        try {
            $user = Auth::user();
            \Google2FA::logout();

            // Prepare the response data
            $data = [
                'wallet' => $user->wallet,
                'phoneNumber' => $user->phone_number,
                'referral_code' => $user->referral_code,
            ];

            // Return the response as JSON
            return successResponse($data);
        } catch (\Exception $exception) {
            // Handle any exceptions
            return failedResponse([]);
        }
    }

public function transferUser(Request $request, TransferService $transferService)
{
    try {
        // Get validated data from the request
        $validator = Validator::make(
            $request->all(),
            [
                'amount' => ['numeric', 'required', 'min:10', 'lte:' . Auth::user()->wallet->amount],
                'receiverCode' => ['required'],
                'verificationCode' => ['required'],
            ],
            [
                'amount.required' => 'The amount field is required.',
                'amount.numeric' => 'The amount must be a numeric value.',
                'amount.min' => 'The amount must be at least 10.',
                'amount.lte' => 'The amount must not exceed your wallet balance.',
                'receiverCode.required' => 'The receiver code is required.',
                'verificationCode.required' => 'The verification code is required.',
            ]
        );

        if ($validator->fails()) {
            return failedResponse($validator->errors());
        }

        // Merge the OTP verification code into the request data
        $validatedData = $validator->validated();
        $user = auth()->user();
        $validatedData['one_time_password'] = $validatedData['verificationCode'];

        // Boot the authenticator
        $authenticator = app(Authenticator::class);
        if (!$authenticator->verify($validatedData['one_time_password'], $user->google2fa_secret)) {
            return failedResponse([], "OTP verification failed.");
        }

        $currentWallet = $user->wallet;

        // Check if transfer amount is valid
        if ($validatedData['amount'] > $currentWallet->amount) {
            return failedResponse([], 'Transfer amount is greater than your balance.');
        }

        // Check if the user is trying to send funds to their own account
        if ($validatedData['receiverCode'] == $user->referral_code) {
            return failedResponse([], 'Sending funds to your own account is not allowed.');
        }

        // Begin database transaction
        DB::beginTransaction();

        // Find the receiver user based on the referral code
        
            $receiver = User::where('referral_code', $validatedData['receiverCode'])->first();
       
            if(!$receiver){
            return failedResponse([], 'Receiver not found.');

            }

        // Perform the wallet updates and transfer creation inside the transaction
        $currentWallet->update([
            'amount' => $currentWallet->amount - $validatedData['amount'],
        ]);

        $receiver->wallet->update([
            'amount' => $receiver->wallet->amount + $validatedData['amount'],
        ]);

        // Log the transfer in the database
        Transfer::create([
            'user_id' => $user->id,
            'wallet_id' => $currentWallet->id,
            'receiver_email' => $receiver->email,
            'amount' => $validatedData['amount'],
            'description' => 'Transfer',
            'type' => 'Approved',
        ]);

        // Commit the transaction
        DB::commit();

        // Return success response
        return successResponse([], "Funds transferred successfully.");

    } catch (ValidationException $exception) {
        // Rollback the transaction in case of validation error
        DB::rollBack();
        return failedResponse($exception->errors(), "Validation Failed.");
    } catch (\Exception $exception) {
        // Rollback the transaction in case of a general exception
        DB::rollBack();
        return failedResponse([$exception->getMessage()], "Transfer failed.");
    }
}

}
