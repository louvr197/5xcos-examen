<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\Battle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
           $query = Battle::query();

    // Filter by status (open/closed)
    if (request('status') === 'open') {
        $query->where('limit_date', '>=', now());
    } elseif (request('status') === 'closed') {
        $query->where('limit_date', '<', now());
    }

    // Filter by title search
    if ($search = request('search')) {
        $query->where('title', 'like', '%' . $search . '%');
    }

    $battles = $query->orderBy('limit_date', 'desc')->paginate(12);

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
        return view('front.battles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBattleRequest $request)
    {
        //
        Gate::authorize('create',Battle::class);
        $validated = $request->validated();
        $battle = Battle::make();
        $battle->title = $validated['title'];
        $battle->description = $validated['description'];
        $battle->limit_date = $validated['limit_date'];
        $battle->user_id = Auth::id();
        $battle->save();
        return redirect()->route('front.battles.show', $battle)->with('success', 'Battle créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Battle $battle)
    {
        //
        // dump("battle id",$battle->id);
        // $memes = $battle->memes;
        $memes = Meme::where('battle_id', $battle->id)->paginate(6);
        // dump("memes ",$memes);
        return view('front.battles.show', [
            'battle' => $battle,
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
