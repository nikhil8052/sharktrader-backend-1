<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListStrategyRequest;
use App\Http\Requests\UpdateListStrategyRequest;
use App\Models\ListStrategy;

class ListStrategyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('strategy.list-strategies', ['strategies' => ListStrategy::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ListStrategy $listStrategy
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $strategy = ListStrategy::find($id);

        return view('strategy.show.index', ['strategy' => $strategy]);
    }
}
