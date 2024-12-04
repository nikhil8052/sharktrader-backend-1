<?php


use App\Http\Controllers\CryptoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\SharkController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\StrategyController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QuantTradeController;
use App\Http\Controllers\StrategiesController;
use App\Http\Controllers\TeamMembersController;
use App\Http\Controllers\ListStrategyController;
use App\Http\Controllers\PhoneNumbersController;
use App\Http\Controllers\RewardsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/sms-code', [PhoneNumbersController::class, 'store']);
Route::get('/app-optimize', function (){
   /* $otp = \App\Models\OtpTable::first();
    $user = \App\Models\User::where('email', 'mkamran.malik72@gmail.com')->first();
    $mail = \Illuminate\Support\Facades\Mail::to('mkamran.malik72@gmail.com')->send(new \App\Mail\OtpMail($otp, $user, 'testing'));
    dd($mail);*/
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
//    \Illuminate\Support\Facades\Artisan::call('migrate');
    dd('cleared');
});

Route::auth();

Route::get('tinker', function(){

    $strategies = App\Models\Strategy::select('id', 'active_until', 'status')
        ->where('active_until', '<=',\Carbon\Carbon::now())
        ->where('status','=', 'active')
        ->get();

    return response()->json(['strategies' => $strategies]);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home')->with('email-verified', 'Your email has been successfull');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify', function () {
    return view('email-verification');
})->middleware(['auth'])->name('verification.notice');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('/logout-user', [LoginController::class, 'destroy']);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('/change-password', [UserMenuController::class, 'changePassword'])->name('home.changePassword');
    Route::post('/change-password', [UserMenuController::class, 'storeNewPassword'])->name('home.changePassword.store');

    Route::get('/payment-password', [UserMenuController::class, 'paymentPassword'])->name('home.paymentPassword');
    Route::post('/payment-password', [UserMenuController::class, 'getPaymentPassword'])->name('home.paymentPassword.get');

    Route::post('/email-otp', [UserMenuController::class, 'sendOTPcode'])->name('home.sendOTPcode');

    Route::get('/user-menu', [UserMenuController::class, 'index'])->name('user-menu');
    Route::get('/l-menu', [UserMenuController::class, 'leftMenu'])->name('l-menu');

    Route::get('/privacy-policy', [UserMenuController::class, 'privacyPolicy'])->name('privacy-policy');

    Route::get('/my-wallet', [WalletController::class, 'index'])->name('my-wallet');
    Route::get('/my-wallet/{wallet}', [WalletController::class, 'index'])->name('wallet.my');
    Route::patch('/my-wallet/{wallet}', [WalletController::class, 'update'])->name('wallet.update');

    Route::get('/list-strategies', [ListStrategyController::class, 'index'])->name('list-strategies');
    Route::get('/list-strategies/{id}', [ListStrategyController::class, 'show'])->name('list-strategies.show');
    Route::get('/my-strategy/{strategy}', [StrategyController::class, 'show'])->name('strategy.show');

    Route::get('/my-strategy', [StrategyController::class, 'index'])->name('my-strategy');

    Route::get('/spider-web', [SharkController::class, 'index'])->name('shark');
    Route::post('/buy-spider-web', [SharkController::class, 'buy'])->name('sharks.buy');
    Route::post('/claim-shark', [SharkController::class, 'claimShark'])->name('sharks.claim');
    Route::post('/claim-reward', [RewardsController::class, 'claim'])->name('reward.claim');
    Route::post('/checkin', [\App\Http\Controllers\UserController::class, 'checkin'])->name('checkin');


    Route::get('/quant-trade', [QuantTradeController::class, 'index'])->name('quant-trade');
    Route::get('/quant-trade/{quantTrade}', [QuantTradeController::class, 'show'])->name('quant-trade.show');
    Route::post('/quant-trade', [QuantTradeController::class, 'store'])->name('quant-trade.store');

    Route::get('/faq', [HelperController::class, 'index'])->name('faq');
    Route::get('/company', [HelperController::class, 'company'])->name('company');
    Route::get('/media-related', [HelperController::class, 'mediaRelated'])->name('media-related');

    Route::get('/my-profile', [ProfileController::class, 'profile'])->name('profile.edit');
    Route::post('/my-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/my-team', [TeamController::class, 'index'])->name('team');
    Route::get('/claim-commission/{team}', [TeamController::class, 'claimCommission'])->name('team.claim-commission');
    Route::put('/join-team', [TeamMembersController::class, 'create'])->name('join-team');

    Route::get('/deposit', [DepositController::class, 'index'])->name('wallet.deposit.index');
//    Route::post('/deposit/invoice', [DepositController::class, 'invoice'])->name('wallet.deposit.invoice');
    Route::post('/deposit/add', [DepositController::class, 'deposit'])->name('wallet.deposit.add');
//    Route::get('/deposit/invoice', [DepositController::class, 'storeDeposit'])->name('wallet.deposit.store_deposit');
//    Route::post('/deposit/success', [DepositController::class, 'success'])->name('wallet.deposit.success');
    Route::get('/deposit/cancel', [DepositController::class, 'cancelDeposit'])->name('wallet.deposit.cancel');
    Route::get('/deposit/{payment_id}', [DepositController::class, 'paymentStatus'])->name('wallet.deposit.status');
    Route::get('/transactions', [DepositController::class, 'transactions'])->name('wallet.deposit.transactions');

    Route::get('/withdraw', [WithdrawController::class, 'index'])->name('wallet.withdraw.index');
    Route::post('/withdraw-funds', [WithdrawController::class, 'withdraw'])->name('wallet.withdraw.funds');
    Route::get('/awaiting-withdrawals', [WithdrawController::class, 'awaiting'])->name('withdraw.awaiting');
    Route::get('/approved-withdrawals', [WithdrawController::class, 'approved'])->name('withdraw.approved');
    Route::get('/withdraw/{id}', [WithdrawController::class, 'approvedDetails'])->name('withdraw.approvedDetails');

    Route::get('/transfer', [TransferController::class, 'index'])->name('wallet.transfer.index');
    Route::post('/transfer-user', [TransferController::class, 'transferUser'])->name('wallet.transfer.transfer-user');

    Route::get('/exchange', [ExchangeController::class, 'index'])->name('exchange.index');

    Route::get('/invite_users', [HelperController::class, 'invite'])->name('helper.invite');
    Route::get('/rates', [ExchangeController::class, 'rates'])->name('exchange.rates');
    Route::get('/user-tutorial', [HelperController::class, 'userTutorial'])->name('userTutorial');
    Route::get('/download-file/', [HelperController::class, 'download'])->name('download-file');
    Route::post('/crypto-list', [CryptoController::class, 'getCryptoList']);

    Route::get('/2fa', [\App\Http\Controllers\UserController::class, 'require2fa'])->name('show.2fa');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin-panel');
    Route::get('/admin-users', [AdminController::class, 'users'])->name('admin-users');

    Route::get('/admin-fox', [SharkController::class, 'shark'])->name('admin-shark');
    Route::post('/admin-fox', [SharkController::class, 'store'])->name('admin-store-shark');
    Route::get('/admin-fox/{shark}', [SharkController::class, 'show'])->name('admin-show-shark');
    Route::get('/send-fox/{user}', [SharkController::class, 'showSendFox'])->name('send-fox');
    Route::post('/send-fox/{user}', [SharkController::class, 'sendFox'])->name('send-fox-post');
    Route::patch('/admin-fox/{shark}', [SharkController::class, 'update'])->name('admin-update-shark');
    Route::delete('/delete-fox/{shark}', [SharkController::class, 'destroy'])->name('admin-delete-shark');

    Route::prefix('user-wallet')->group(function(){
        Route::get('/{user_id}', [AdminController::class, 'wallet'])->name('admin-user-wallet');
        Route::get('/info/{user}', [AdminInfoController::class, 'index'])->name('admin-user-info');
        Route::get('/deposits/{user}', [AdminController::class, 'deposits'])->name('admin-user-deposits');
        Route::post('/deposits/{user}/approve/{deposit}', [AdminController::class, 'approveDeposit'])->name('admin-user-deposits-approve');
        Route::get('/withdraws/{user}', [AdminController::class, 'withdraws'])->name('admin-user-withdraws');
        Route::get('/transfers/{user}', [AdminController::class, 'transfers'])->name('admin-user-transfers');
        Route::patch('/approve-withdraw', [WithdrawController::class, 'update'])->name('admin-approve-withdraw');
    });

    Route::resource('cycle', CycleController::class)->only(['index', 'store']);
    Route::get('cycle-admin/{quantTrade}', [CycleController::class, 'show'])->name('admin-show-cycle');
    Route::patch('/cycle-admin/{quantTrade}', [CycleController::class, 'update'])->name('cycle.update');
    Route::delete('/delete-cycle/{quantTrade}', [CycleController::class, 'destroy'])->name('admin-delete-cycle');

    Route::resource('strategies', StrategiesController::class)->only(['index', 'store']);

    Route::get('strategy-admin/{listStrategy}', [StrategiesController::class, 'show'])->name('admin-show-strategy');
    Route::patch('/strategy-admin/{listStrategy}', [StrategiesController::class, 'update'])->name('strategy.update');
    Route::delete('/delete-strategy/{listStrategy}', [StrategiesController::class, 'destroy'])->name('admin-delete-strategy');
});

Route::get('/complete-registration', [\App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('complete.registration');
//Route::get('/setup-2fa-screen', [\App\Http\Controllers\UserController::class, 'setup2faScreen'])->name('screen.2fa');
Route::get('/setup-2fa', [\App\Http\Controllers\UserController::class, 'setup2fa'])->name('complete.2fa');
Route::post('/setup-2fa', [\App\Http\Controllers\UserController::class, 'update2fa'])->name('update.2fa');
Route::get('callbacks/deposit/success', [DepositController::class, 'successDepositCallback'])->name('wallet.deposit.success.callback');
Route::get('cache-clear', function (){
    /*$user = \App\Models\User::where('email', 'kamran31@gmail.com')->first();
    $wallet = $user->wallet;
    $wallet->amount = 5000;
    $wallet->save();
    dd($wallet);*/
  \Illuminate\Support\Facades\Artisan::call('config:clear');
  \Illuminate\Support\Facades\Artisan::call('config:cache');
  \Illuminate\Support\Facades\Artisan::call('view:clear');
  \Illuminate\Support\Facades\Artisan::call('optimize:clear');
  dd('done');
});
