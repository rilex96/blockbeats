<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMusicRequest;
use App\Models\Music;
use Illuminate\Http\Request;

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

    public function update(Request $request, Music $song)
    {
        if($song->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'bpm' => 'required',
        ]);

        if($request->hasFile('image_file')) {
            $newImageFilePath = $request->file('image_file')->store('images', 'public');
            $formFields['image_file'] = $newImageFilePath;
        }

        if($request->hasFile('song_file')) {
            $newSongFilePath = $request->file('song_file')->store('songs', 'public');
            $formFields['song_file'] = $newSongFilePath;
        }

        $song->update($formFields);
        return redirect('/')->with('message', 'Song is edited successfully');
    }

     public function edit(Music $song)
    {
        if ($song->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        return view('songpage.songedit', ['song' => $song]);
    }

    public function destroy(Music $song)
    {
        if($song->user_id != auth()->id()) {
            abort(403,'Unauthorized action.');
        }
        $song->delete();
        return redirect('/')->with('message', 'Song deleted successfully!');
    }
}