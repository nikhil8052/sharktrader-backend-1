<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCycleRequest;
use App\Http\Requests\StoreSharkRequest;
use App\Http\Requests\UpdateCycleRequest;
use App\Models\QuantTrade;
use Exception;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    public function index()
    {
        return view('admin.cycle.index', ['cycles' => QuantTrade::all()]);

    }

    public function store(StoreCycleRequest $cycleRequest): \Illuminate\Http\RedirectResponse
    {
        try {
            $data = $cycleRequest->validated();

            QuantTrade::create([
                'price'       => $data['price'],
                'duration'   => $data['duration'],
            ]);

            return redirect()->back()->with('success', "Successfuly added the new cycle");
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', "Couldn't add a new cycle");
        }
    }

    public function show(QuantTrade $quantTrade)
    {
        return view('admin.cycle.show', ['cycle' => $quantTrade]);
    }

    public function update(UpdateCycleRequest $cycleRequest,QuantTrade $quantTrade): \Illuminate\Http\RedirectResponse
    {
        $data = $cycleRequest->validated();
        try {
            $quantTrade->update([
                'price'       => $data['price'],
                'duration'   => $data['duration'],
            ]);

            return redirect()->back()->with('success', "Successfuly updated the cycle");
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', "Couldn't update cycle");
        }
    }

    public function destroy(QuantTrade $quantTrade): \Illuminate\Http\RedirectResponse
    {
        try {
            $quantTrade->delete();

            return redirect()->back()->with('success', "Successfuly deleted the cycle");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't delete cycle");
        }
    }
}
