<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="static/css/music-player.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body>
    <section id="music-player">
        <div class="s-container">
            <div class="player-container">
                @foreach ($songs as $index => $song)
                    <div class="song{{ $index == $selectedSongIndex ? ' playing' : '' }}"
                        data-index="{{ $index }}"
                        style="background-image: url('storage/{{ $song->image_file }}')"
                        wire:click="changeIndex({{ $index }})" wire:model="selectedSongIndex">
                        @if ($index == $selectedSongIndex)
                            <div class="song-desc">
                                <h3>{{ $song->title }}</h3>
                                <p>Genre:{{ $song->genre }}</p>
                                <p>BPM:{{ $song->bpm }}</p>
                            </div>
                            <div class="progress-container">
                                <div class="duration" id="duration-{{ $index }}"></div>
                                <div class="waveform" id="waveform-{{ $index }}"></div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            @livewire('controls', ['selectedSongIndex' => $selectedSongIndex], key($selectedSongIndex))
        </div>

        </div>
        <div class="playlist-container"></div>
        </div>
    </section>
    @livewireScripts
    <script type="module">
      import WaveSurfer from 'https://unpkg.com/wavesurfer.js@7/dist/wavesurfer.esm.js'

    document.addEventListener('DOMContentLoaded', function () {
        @foreach ($songs as $index => $song)
            @if ($index == $selectedSongIndex)
                const wavesurfer{{ $index }} = WaveSurfer.create({
                    container: '#waveform-{{ $index }}',
                    waveColor: '#ffffff',
                    progressColor: '#fafafa',
                    cursorColor: '#000000',
                    cursorWidth: 1,
                    height: 90,
                    barWidth: 1,
                    bar: 1,
                    scrollParent: true,
                    normalize: true,
                    normalizeWidth: true,
                    normalizeHeight: true,
                });

            wavesurfer{{ $index }}.load('storage/{{ $song->song_file }}');

            wavesurfer{{ $index }}.on('ready', function () {
                const duration = wavesurfer{{ $index }}.getDuration();
                const formattedDuration = formatTime(duration);
                document.getElementById('duration-{{ $index }}').innerText = formattedDuration;
            });
            @endif
        @endforeach

        // Function to format time in minutes and seconds
        function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        const formattedTime = `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
        return formattedTime;
        }
    });



    </script>
</body>

</html>
