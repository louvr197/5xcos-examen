<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use Illuminate\Support\Facades\Redirect;

class VoteController extends Controller
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

    public function store(StoreVoteRequest $request)
    {
        $validated = $request->validated();

        $userId = auth()->id();

        Vote::updateOrCreate(
            [
                //  UNIQUE constraint columns
                'user_id' => $userId,
                'meme_id' => $validated['meme_id']
            ],
            [
                // Values to create/update.

                'score' => $validated['score'],
                'user_id' => $userId,
                'meme_id' => $validated['meme_id'],
            ]
        );

        return Redirect::back()->with('success', 'Your score has been recorded!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
