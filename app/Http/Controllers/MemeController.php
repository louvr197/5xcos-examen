<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\Battle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreMemeRequest;
use App\Http\Requests\UpdateMemeRequest;
use Illuminate\Support\Facades\Redirect;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreMemeRequest $request, Battle $battle)
    {
        //
        // dump($battle);
        Gate::authorize('create', [Meme::class, $battle]);

        $meme = Meme::make();
        $meme->user_id = Auth::id();
        $meme->battle_id = $battle->id;
        $validated = $request->validated();
        if ($request->hasFile('meme_path')) {
            $path = $request->file('meme_path')->store('memes', 'public');
            $meme->meme_path = $path;
        } else {
            return back()->withErrors(['error' => "Aucune image envoyée."]);
        }
        $meme->save();

        return redirect()->route('front.battles.show', $battle)->with('success', 'Mème ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meme $meme)
    {
        //
        return view('front.memes.show', [
            'meme' => $meme,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meme $meme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemeRequest $request, Meme $meme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meme $meme)
    {
        //
    }
}
