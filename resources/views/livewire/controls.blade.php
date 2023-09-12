<div class="controls">
    <div class="controls-left">
        <i class="fas fa-step-backward" style="color: white" wire:click="changeIndex({{ $selectedSongIndex - 1 }})"></i>
    </div>
    <div class="play-pause">
        <i class="fas fa-solid fa-play" style="color: white"></i>
    </div>
    <div class="controls-right">
        <i class="fas fa-step-forward" style="color: white" wire:click="changeIndex({{ $selectedSongIndex + 1 }})"></i>
    </div>
</div>
