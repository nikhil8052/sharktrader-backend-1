<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStrategyRequest;
use App\Http\Requests\UpdateStrategyRequest;
use App\Models\ListStrategy;
use Exception;

class StrategiesController extends Controller
{
    public function index()
    {
        return view('admin.strategies.index', ['strategies' => ListStrategy::all()]);

    }

    public function store(StoreStrategyRequest $strategyRequest): \Illuminate\Http\RedirectResponse
    {
        
        try {
            $data = $strategyRequest->validated();
        
            ListStrategy::create([
                'name'        => $data['name'],
                'posted_by'   => $data['posted_by'],
                'details'     => $data['details'],
            ]);

            return redirect()->back()->with('success', "Successfuly added the new strategy");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't add a new strategy");
        }
    }

    public function show(ListStrategy $listStrategy)
    {
        return view('admin.strategies.show', ['strategy' => $listStrategy]);
    }

    public function update(UpdateStrategyRequest $strategyRequest, ListStrategy $listStrategy): \Illuminate\Http\RedirectResponse
    {

        $data = $strategyRequest->validated();
        try {
            $listStrategy->update([
                'name'        => $data['name'],
                'posted_by'   => $data['posted_by'],
                'details'     => $data['details'],
            ]);

            return redirect()->back()->with('success', "Successfuly updated the strategy");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't update strategy");
        }
    }

    public function destroy(ListStrategy $listStrategy): \Illuminate\Http\RedirectResponse
    {
        try {
            $listStrategy->delete();

            return redirect()->back()->with('success', "Successfuly deleted the strategy");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Couldn't delete strategy");
        }
    }
}
