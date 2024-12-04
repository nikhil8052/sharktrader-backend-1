<?php

namespace App\Http\Controllers;

use App\Events\SuccessfulDeposit;
use App\Http\Requests\APIStoreDepositRequest;
use App\Http\Requests\StoreDepositRequest;
use App\Models\Deposit;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Services\ClientAPI;
use App\Services\DepositService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PrevailExcel\Nowpayments\Facades\Nowpayments;

class DepositController extends Controller
{
    public function index()
    {
        $user = \auth()->user();
        $transactionExists = $user->transactions()->waiting()->first();
        if ($transactionExists){
            $valid_until = Carbon::createFromDate($transactionExists->valid_until);
            if($valid_until->isPast()){
                $transactionExists->payment_status = 'canceled';
                $transactionExists->save();

            }else{
                $this->updatePayments($transactionExists->payment_id);
            }
        };
        return view('wallet.deposit.index', [
            'wallet' => Auth::user()->wallet,
            'transactionExists' => $transactionExists
        ]);
    }

    protected function updatePayments($payment_id){
        $nowpayments = Nowpayments::getPaymentStatus($payment_id);
        if ($nowpayments){
            $payment_id = $nowpayments['payment_id'];
            $transaction = Transaction::where('payment_id', $payment_id)->first();
            if ($transaction){
                $transaction->update($nowpayments);
            }else{
                $nowpayments['user_id'] = \auth()->id();
                $user = \auth()->user();
                $deposit = Deposit::create([
                    'user_id'         => $user->id,
                    'transaction_id'  => $transaction['id'],
                    'wallet_id'       => $user->wallet->id,
                    'amount'          => $nowpayments['price_amount'],
                    'description'     => config('app.name') . ' Deposit',
                    'type'            => $nowpayments['pay_currency'],
                    'status'          => 'Pending',
                    'available_until' => now(),
                ]);
                $data['value_coin'] = $nowpayments['price_amount'];
                if ($nowpayments['payment_status'] == 'finished'){
                    SuccessfulDeposit::dispatch($deposit, $data);
                }
            }
        }
    }
    /**
     * @throws Exception
     */
    public function confirmB(StoreDepositRequest $request, DepositService $depositService)
    {
        $data = $request->validated();

        try {
            $deposit = $depositService->handle($data);

            $blockBee = (new ClientAPI($data, $deposit))
                ->createAddress()
                ->getDepositQR();

            return view('wallet.deposit.confirm', [
                'depositAmount' => $data['amount'],
                'qr_code'       => @$blockBee->qrCode,
                'payment_uri'   => @$blockBee->response->address_in,
                'available'     => Carbon::now()->addMinutes(20)->format('d-m-Y H:i:s')
            ]);

        } catch (Exception $exception) {
            Log::error('Deposit Error' . $exception);
            return redirect()->back()->with('error', "Couldn't proceed with the deposit");
        }
    }
    public function invoice(StoreDepositRequest $request)
    {
        $data = $request->validated();
        $payoutCurrency = 'USDTTRC20';
        if ($data['withdrawalAddress'] == 'trc20/usdt' || $data['withdrawalAddress'] == 'TRC20/USDT'){
            $payoutCurrency = 'USDTTRC20';
        }
        if ($data['withdrawalAddress'] == 'bep20/usdt' || $data['withdrawalAddress'] == 'BEP20/USDT'){
            $payoutCurrency = 'USDTBEP20';
        }
        if ($data['withdrawalAddress'] == 'bsc/usdt' || $data['withdrawalAddress'] == 'BSC/USDT'){
            $payoutCurrency = 'USDTBSC';
        }
        try {
            $invoice_data = [
                'price_amount' => request()->amount ?? 0,
                'price_currency' => 'usd',
                'order_id' => uniqid(), // you can generate your order id as you wish
                'order_description' => config('app.name') . ' Deposit',
                'ipn_callback_url' => url('/'),
                'success_url' => route('wallet.deposit.success'),
                'cancel_url' => route('wallet.deposit.cancel'),
                'partially_paid_url' => url('/'),
                'is_fixed_rate' => true,
                'is_fee_paid_by_user' => true,
                'pay_currency' => $payoutCurrency,
            ];

            $invoiceDetails = Nowpayments::createInvoice($invoice_data);
            $invoiceDetails['user_id'] = \auth()->id();
            if ($invoiceDetails['id'] != ''){
                $invoiceDetails['invoice_id'] = $invoiceDetails['id'];
            }
            Invoice::create($invoiceDetails);
            return view('wallet.deposit.confirm', [
                'depositAmount' => $invoiceDetails['price_amount'] ?? 0,
//                'qr_code'       => $blockBee->qrCode,
                'payment_uri'   => $invoiceDetails['invoice_url'],
//                'payment_address'   => $invoiceDetails['pay_address'],
                'available'     => Carbon::now()->addMinutes($invoiceDetails['created_at'])->addMinutes(20)->format('d-m-Y H:i:s')
            ]);

        } catch (Exception $exception) {
            Log::error('Deposit Error' . $exception);
            return redirect()->back()->with('error', "Couldn't proceed with the deposit");
        }
    }
    public function deposit(StoreDepositRequest $request)
    {
//        dd(Carbon::createFromDate('2024-01-31T13:50:15.121Z'));
        $data = $request->validated();
        $payoutCurrency = 'USDTTRC20';
        if ($data['withdrawalAddress'] == 'trc20/usdt' || $data['withdrawalAddress'] == 'TRC20/USDT'){
            $payoutCurrency = 'USDTTRC20';
            $payoutAddress = "TRFWgnLmTSvxvKaRs64nfZRQ6EL2nh3JFy";
        }
        if ($data['withdrawalAddress'] == 'bep20/usdt' || $data['withdrawalAddress'] == 'BEP20/USDT'){
            $payoutCurrency = 'USDTBEP20';
            $payoutAddress = "0x2fbe6eb1ebab9899da7959c50144d31a01c9f440";
        }
        if ($data['withdrawalAddress'] == 'bsc/usdt' || $data['withdrawalAddress'] == 'BSC/USDT'){
            $payoutCurrency = 'USDTBSC';
            $payoutAddress = "0x2fbe6eb1ebab9899da7959c50144d31a01c9f440";
        }
        try {
            $user = \auth()->user();
            $transactionExists = $user->transactions()->waiting()->first();
            if ($transactionExists){
                $valid_until = Carbon::createFromDate($transactionExists->valid_until);
                if($valid_until->isPast()){
                    $transactionExists->payment_status = 'canceled';
                    $transactionExists->save();
                }else{
                    return view('wallet.deposit.confirm', [
                        'already' => true,
                        'depositAmount' => $transactionExists->price_amount,
                        'payment_address'   => $transactionExists->pay_address,
                        'payment_id' => $transactionExists->payment_id,
                        'available'     => $valid_until->format('d-m-Y h:i:s A')
                    ]);
                }
            }
            $payment_data = [
                'price_amount' => request()->amount ?? 0,
                'price_currency' => 'usd',
                'pay_amount' => request()->amount ?? 0,
                'pay_currency' => $payoutCurrency,
//                'payout_currency' => $payoutCurrency,
                'ipn_callback_url' => route('wallet.deposit.success.callback'),
                'order_id' => uniqid(),
                'order_description' => config('app.name') . ' Deposit',
                'case' => 'success',
            ];

            $transactionData = Nowpayments::createPayment($payment_data);
            $transactionData['user_id'] = \auth()->id();
            if (isset($transactionData['expiration_estimate_date'])){
                $transactionData['expiration_estimate_date'] = Carbon::createFromDate($transactionData['expiration_estimate_date'])->format('Y-m-d H:i:s');
            }
            $valid_until = now()->addMinutes(20)->format('Y-m-d H:i:s');
            if (isset($transactionData['valid_until'])){
                $transactionData['valid_until'] = Carbon::createFromDate($transactionData['valid_until'])->format('Y-m-d H:i:s');
                $valid_until = Carbon::createFromDate($transactionData['valid_until'])->format('d-m-Y h:i:s A');
            }
            $transaction = Transaction::create($transactionData);
            return view('wallet.deposit.confirm', [
                'depositAmount' => $transactionData['price_amount'] ?? 0,
//                'qr_code'       => $blockBee->qrCode,
//                'payment_uri'   => $transactionData['invoice_url'],
                'payment_id' => $transactionData['payment_id'],
                'payment_address'   => $transactionData['pay_address'],
                'available'     => $transactionData['valid_until'] ? $valid_until : '--'
            ]);

        } catch (Exception $exception) {
            Log::error('Deposit Error' . $exception);
//            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
            return redirect()->back()->with('error', "Couldn't proceed with the deposit due to price changing currently try again");
        }
    }
    public function depositwithoutNowpayments(StoreDepositRequest $request)
    {
        $data = $request->validated();
        $payoutCurrency = 'USDTTRC20';
        $payoutAddress = "TEXfvj5UqxRodcye4yC3oM48pc3ayhgbyo";
        if ($data['withdrawalAddress'] == 'trc20/usdt' || $data['withdrawalAddress'] == 'TRC20/USDT'){
            $payoutCurrency = 'USDTTRC20';
            $payoutAddress = "TEXfvj5UqxRodcye4yC3oM48pc3ayhgbyo";
        }
        if ($data['withdrawalAddress'] == 'bep20/usdt' || $data['withdrawalAddress'] == 'BEP20/USDT'){
            $payoutCurrency = 'USDTBEP20';
            $payoutAddress = "0xf12E966c5e3BCFD5663dFc52277AaBba3fd9406c";
        }
        if ($data['withdrawalAddress'] == 'bsc/usdt' || $data['withdrawalAddress'] == 'BSC/USDT'){
            $payoutCurrency = 'USDTBSC';
            $payoutAddress = "0xf12E966c5e3BCFD5663dFc52277AaBba3fd9406c";
        }
        try {
            $user = \auth()->user();
            $transactionExists = $user->transactions()->waiting()->first();
            if ($transactionExists){
                $valid_until = Carbon::createFromDate($transactionExists->valid_until);
                if($valid_until->isPast()){
                    $transactionExists->payment_status = 'canceled';
                    $transactionExists->save();
                }else{
                    return view('wallet.deposit.confirm', [
                        'already' => true,
                        'depositAmount' => $transactionExists->price_amount,
                        'payment_address'   => $transactionExists->pay_address,
                        'payment_id' => $transactionExists->payment_id,
                        'available'     => $valid_until->format('d-m-Y h:i:s A')
                    ]);
                }
            }
            $transactionData = [
                'price_amount' => request()->amount ?? 0,
                'price_currency' => 'usd',
                'pay_amount' => request()->amount ?? 0,
                'pay_currency' => $payoutCurrency,
//                'payout_currency' => $payoutCurrency,
                'ipn_callback_url' => route('wallet.deposit.success.callback'),
                'order_id' => uniqid(),
                'order_description' => config('app.name') . ' Deposit',
                'case' => 'success',
            ];

            $transactionData['user_id'] = \auth()->id();
            $valid_until = now()->addMinutes(20)->format('Y-m-d H:i:s');
            $transactionData['valid_until'] = $valid_until;
            $transactionData['pay_address'] = $payoutAddress;
            $transactionData['payment_id'] = 'tempo-' . uniqid() . '-' . time();
            $transaction = Transaction::create($transactionData);
            $deposit = Deposit::create([
                'user_id' => $user->id,
                'transaction_id' => $transaction->id,
                'wallet_id' => $user->wallet->id,
                'amount' => request()->amount ?? 0,
                'description' => config('app.name') . ' Deposit',
                'type' => $payoutCurrency,
                'status' => 'Pending',
                'available_until' => now(),
            ]);
            return view('wallet.deposit.confirm', [
                'depositAmount' => $transactionData['price_amount'] ?? 0,
                'payment_id' => $transactionData['payment_id'],
                'payment_address'   => $transactionData['pay_address'],
                'available'     => $transactionData['valid_until'] ? $valid_until : '--'
            ]);

        } catch (Exception $exception) {
            Log::error('Deposit Error' . $exception);
            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
            return redirect()->back()->with('error', "Couldn't proceed with the deposit due to price changing currently try again");
        }
    }

    public function storeDeposit(Request $request)
    {
        Log::info($request->all());
        $data = $request->all();

        Log::info('api success', $data);

        try {
            $deposit = Deposit::query()->where('id', $data['deposit_id'])->firstOrFail();


            if ($deposit->status == "Pending"){
                 SuccessfulDeposit::dispatch($deposit, $data);
                return response("*ok*", 200)->header('Content-Type', 'text/plain');

            }
        }catch (Exception $exception){
            Log::error($exception);
        }
    }

    public function paymentStatus($payment_id){
        try {

            $nowpayments = Nowpayments::getPaymentStatus($payment_id);
            if (isset($nowpayments['payment_id']) && $nowpayments['payment_id'] == $payment_id){
                $payment_id = $nowpayments['payment_id'];
                if (Transaction::where('payment_id', $payment_id)->finished()->exists()){
                    return view('wallet.deposit.completed', [
                        'depositAmount' => $nowpayments['price_amount'] ?? 0,
                        'message' => 'Successfully deposited into your account'
                    ]);
                }
                $transaction = Transaction::where('payment_id', $payment_id)->waiting()->first();
                if ($transaction){
//                    $transaction->update($nowpayments);
                    if ($nowpayments['payment_status'] == 'finished'){
                        $transaction->payment_status = 'finished';
                        $transaction->save();
                        $nowpayments = $this->depositAmount($nowpayments, $transaction->id);
                        return view('wallet.deposit.completed', [
                            'depositAmount' => $nowpayments['price_amount'] ?? 0,
                            'message' => 'Successfully deposited into your account'
                        ]);
                    }
                    return view('wallet.deposit.completed', [
                        'depositAmount' => $nowpayments['price_amount'] ?? 0,
                        'message' => 'Pending',
                        'transaction' => $transaction
                    ]);
                }else{
                    return view('wallet.deposit.completed', [
                        'depositAmount' => $nowpayments['price_amount'] ?? 0,
                        'message' => 'Wrong Payment Order.'
                    ]);
                }
            }
            return view('wallet.deposit.completed', [
                'depositAmount' => $nowpayments['price_amount'] ?? 0,
                'message' => 'Wrong Payment Order.'
            ]);
        }catch (Exception $exception){
            Log::error($exception);
        }
        return redirect()->route('wallet.deposit.index');
    }
    public function successDepositCallback(Request $request){
        Log::info('IPN Notification');
        Log::info($request->all());
//        dd('here');
    }

    /**
     * @param $nowpayments
     * @param $id
     * @return mixed
     */
    public function depositAmount($nowpayments, $id)
    {
        $nowpayments['user_id'] = \auth()->id();
        $user = \auth()->user();
        $deposit = Deposit::create([
            'user_id' => $user->id,
            'transaction_id' => $id,
            'wallet_id' => $user->wallet->id,
            'amount' => $nowpayments['price_amount'],
            'description' => config('app.name') . ' Deposit',
            'type' => $nowpayments['pay_currency'],
            'status' => 'Pending',
            'available_until' => now(),
        ]);
        $data['value_coin'] = $nowpayments['price_amount'];
        SuccessfulDeposit::dispatch($deposit, $data);
        return $nowpayments;
    }
    public function transactions(){
        $user = \auth()->user();
        $transactions = Transaction::where('user_id', \auth()->id())->paginate(10);
        return view('wallet.deposit.transactions', [
            'transactions' => $transactions
        ]);
    }
}
