<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Http\Requests\StoreBattleRequest;
use App\Http\Requests\UpdateBattleRequest;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $battles = Battle::paginate(12);
        return view('front.battles.index', [
            'battles' => $battles,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBattleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Battle $battle)
    {
        //
        // dump("battle id",$battle->id);
        $memes = $battle->memes;
        // dump("memes ",$memes);
        return view('front.battles.show', [
            'memes' => $memes,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Battle $battle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBattleRequest $request, Battle $battle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Battle $battle)
    {
        //
    }
}
