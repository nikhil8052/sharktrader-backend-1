<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuySharkRequest;
use App\Http\Requests\ClaimSharkRequest;
use App\Http\Requests\SendSharkRequest;
use App\Http\Requests\StoreSharkRequest;
use App\Http\Requests\UpdateSharkRequest;
use App\Models\Shark;
use App\Models\User;
use App\Services\UpdateUserAmountService;
use Carbon\Carbon;
use Exception;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class SharkController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $present = $user->sharks->filter(function ($shark) {
            return $shark->pivot->present == true;
        });


        return view('shark.index', [
            'sharks' => Shark::all(),
            'present' => $present->first(),
            'user' => $user
        ]);
    }

    public function shark()
    {
        return view('admin.shark.index', ['sharks' => Shark::all()]);
    }

    public function store(StoreSharkRequest $sharkRequest): \Illuminate\Http\RedirectResponse
    {
        try {
            $data = $sharkRequest->validated();

            Shark::create([
                'name' => $data['name'],
                'cost' => $data['cost'],
                'percentage' => $data['percentage'],
                'duration' => $data['duration'],
                'status' => 1,
            ]);

            return redirect()->back()->with('success', "Successfuly added the new SpiderWeb");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't add a new SpiderWeb");
        }
    }

    public function show(Shark $shark)
    {
        return view('admin.shark.show', ['shark' => $shark]);
    }

    public function update(UpdateSharkRequest $sharkRequest, Shark $shark)
    {
        $data = $sharkRequest->validated();

        try {
            $shark->update([
                'name' => $data['name'],
                'cost' => $data['cost'],
                'percentage' => $data['percentage'],
                'duration' => $data['duration'],
                'status' => 1,
            ]);

            return redirect()->back()->with('success', "Successfuly updated the SpiderWeb");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't update SpiderWeb");
        }
    }

    public function buy(BuySharkRequest $request, UpdateUserAmountService $updateUserAmountService)
    {
        $request->merge(['one_time_password' => $request->one_time_password]);
        $authenticator = app(Authenticator::class)->boot($request);
        if (!$authenticator->isAuthenticated()){
            throw \Illuminate\Validation\ValidationException::withMessages(['one_time_password' => "The 'One Time Password' typed was wrong."]);
        }
        return $updateUserAmountService->handle($request->validated());
    }

    public function destroy(Shark $shark)
    {
        try {
            $shark->delete();

            return redirect()->back()->with('success', "Successfuly deleted the new SpiderWeb");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't delete SpiderWeb");
        }
    }

    public function showSendFox(User $user)
    {
        return view('admin.shark.sendFox', [
            'user' => $user,
            'activeSharks' => $user->sharks,
            'sharks' => Shark::all()
        ]);
    }

    public function sendFox(User $user, SendSharkRequest $request)
    {
        try {
            $data = $request->validated();

            $shark = Shark::query()->where('name', $data['fox'])->first();

            $user->sharks()->attach($shark, [
                'active'       => false,
                'created_at'   => now(),
                'updated_at'   => now(),
                'present'      => true,
                'active_until' => Carbon::now()->addDays($shark->duration),
            ]);

            return redirect()->back()->with('success', "Successfully sent the SpiderWeb to user !");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't send SpiderWeb to user");
        }
    }

    public function claimShark(ClaimSharkRequest $request)
    {
        $data = $request->validated();

        try {
            $user = User::query()->find($data['user_id']);

            $presentShark = $user->sharks->filter(function ($shark) {
                return $shark->pivot->present;
            })->first();

            $presentShark->pivot->update([
                'present' => false,
                'active'  => true,
                'active_until' => Carbon::now()->addDays($presentShark->duration),
            ]);

            response()->json([
                'success' => true,
            ], 200);

        } catch (Exception $exception) {
            response()->json([
                'success' => false,
            ], 500);
        }
    }

}
