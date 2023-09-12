<?php

namespace App\Http\Livewire;

use App\Models\Music;
use Livewire\Component;

class Controls extends Component
{
    public $selectedSongIndex;
    public $songs;

    public function mount($selectedSongIndex)
    {
        $this->selectedSongIndex = $selectedSongIndex;
        $this->songs = Music::all();
    }

    public function changeIndex($newIndex)
    {
        if ($newIndex >= 0 && $newIndex < count($this->songs)) {
            $this->selectedSongIndex = $newIndex;
        }
    }

    public function render()
    {
        return view('livewire.controls');
    }
}