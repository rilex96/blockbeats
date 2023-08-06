<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMusicRequest;
use App\Http\Requests\UpdateMusicRequest;
use App\Models\Music;
use GuzzleHttp\Psr7\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'songs' => Music::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songpage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMusicRequest $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'bpm' => 'required'
        ]);

        if($request->hasFile('image_file')) {
            $formFields['image_file'] = $request->file('image_file')->store('images', 'public');
        }
        if($request->hasFile('song_file')) {
            $formFields['song_file'] = $request->file('song_file')->store('songs', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Music::create($formFields);

        return redirect('/')->with('message', 'Song is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $songs = Music::all();
        $selectedSongIndex = 0;
        return view('songpage.player', compact('songs', 'selectedSongIndex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMusicRequest $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        //
    }
}