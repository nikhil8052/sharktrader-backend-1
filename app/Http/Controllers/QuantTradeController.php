<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStrategiesRequest;
use App\Models\QuantTrade;
use App\Models\Shark;
use App\Models\Strategy;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuantTradeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('quant-trade.index', ['quants' => QuantTrade::all()]);
    }

    public function show(QuantTrade $quantTrade): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $userSharks = Auth::user()->sharks;

        $quantiqFox = $userSharks->filter(function ($shark) {
            if ($shark->pivot->active) {
                return $shark;
            }
        });

        return view('quant-trade.show', [
            'quantiqFox' => json_encode($quantiqFox) ?? json_encode([]),
            'wallet' => json_encode(Auth::user()->wallet) ?? json_encode([]),
            'quantTrade' => json_encode($quantTrade) ?? json_encode([]),
        ]);
    }

    public function store(StoreStrategiesRequest $storeStrategiesRequest)
    {

        try {
            $request = $storeStrategiesRequest->validated();

            $user = User::find($request['user_id']);


            $user->sharks->filter(function ($shark) use ($request) {

                if ($shark->pivot->id == $request['fox']['pivot']['id'] && $shark->pivot->active) {

                    $shark->pivot->update([
                        'active' => false,
                    ]);
                }
            });

            DB::transaction(function () use ($user, $request){
                $user->wallet->update([
                    'amount' => $user->wallet->amount - $request['amount']
                ]);

                $user->wallet->save();
                $order_id = 'SW' . rand(10213568, 99999999);
                if (Strategy::where('order_id', $order_id)->count() > 0){
                    $order_id = 'SW' . rand(10213568, 99999999);
                }
                if (Strategy::where('order_id', $order_id)->count() > 0){
                    $order_id = 'SW' . rand(10213568, 99999999);
                }
                if (Strategy::where('order_id', $order_id)->count() > 0){
                    $order_id = 'SW' . rand(10213568, 99999999);
                }
                Strategy::create([
                    'user_id'      => $request['user_id'],
                    'order_id'      => $order_id,
                    'shark_id'     => $request['fox']['pivot']['id'],
                    'name'         => $request['fox']['name'],
                    'percentage'   => $request['percentage'],
                    'amount'       => $request['amount'],
                    'earnings'     => $request['earnings'],
                    'cycle'        => $request['cycle'],
                    'status'       => 'active',
                    'active_until' => Carbon::now()->addHours($request['cycle']),
                ]);
                $reward = HelperController::getReward(true);
            });

            return redirect()->route('my-strategy');

        } catch (Exception $exception) {
            return redirect()->back()->withErrors(
                ['error' => $exception]
            );
        }
    }
}
