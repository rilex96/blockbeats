<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Custom -->
    <link rel="stylesheet" href="static/css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/home.css">
    <link rel="shortcut icon" href="static/images/logo.svg" type="image/x-icon">
    <title>BlockBeatz</title>
    <link rel="stylesheet" href="static/css/music.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        {{-- @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

        <section id="navbar">
            <nav class="navbar">
                <ul class="navbar-menu">
                    <li class="navbar-item"><a href="#home" class="navbar-link">Home</a></li>
                    <li class="navbar-item"><a href="#music" class="navbar-link">Music</a></li>
                    <li class="navbar-item"><a href="#about-me" class="navbar-link">About me</a></li>
                    <li class="navbar-item"><a href="#contact" class="navbar-link">Contact</a></li>
                </ul>
            </nav>
            <div class="hamburger-btn">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <nav class="navbar-mobile">
                <ul class="navbar-menu-mobile">
                    <li class="navbar-item-mobile"><a href="#home" class="navbar-link">Home</a></li>
                    <li class="navbar-item-mobile"><a href="#music" class="navbar-link">Music</a></li>
                    <li class="navbar-item-mobile"><a href="#about-me" class="navbar-link">About Me</a>
                    </li>
                    <li class="navbar-item-mobile"><a href="#contact" class="navbar-link">Contact Me</a>
                    </li>

                </ul>
            </nav>
        </section>
        <div id="loading-container">
            <div class="shapes"></div>
        </div>
        <section class="home" id="home">
            <header>
                <div class="welcome__container">
                    <div class="top-left">
                        <img src="static/images/logo-clean.png" alt="">
                        <h1>BlockBeatz</h1>
                    </div>
                    <div class="center__text">
                        <h2>Authentic Hip-Hop Music</h2>
                        <h3>High-Quality beats and instrumentals</h3>
                        <p class="intro">
                            If you're on the hunt for custom-made hip-hop beats that scream originality and vibe, then
                            you've come to the right place.<br /> <br /> From the hard-hitting boom-bap to the smooth
                            and soulful
                            melodies, I've got the range to cater to your unique style and vision. <br /><br />
                            Whether you're an aspiring rapper looking for that perfect backdrop for your lyrical flow, a
                            filmmaker in need of a killer soundtrack, or a content creator searching for the perfect
                            beat to
                            set the mood for your videos, I've got you covered.</p>
                    </div>
                </div>
            </header>
        </section>
        <main>
            <section class="music-container" id="music">
                <div class="m-container">
                    <div class="music-player-container">
                        <div class="player">
                            <div class="spinner"></div>
                            @foreach ($songs as $index => $song)
                                <div class="music-card">
                                    <div class="song {{ $index === 0 ? 'active playing' : '' }}"
                                        data-playlist-id="playlist-{{ $index }}"
                                        style="background-image: url('{{ asset('storage/' . $song->image_file) }}')">
                                        <div class="description">
                                            <div class="card-text">
                                                <h3 class="title">Title: {{ $song->title }}</h3>
                                                <p class="genre">Genre: {{ $song->genre }}</p>
                                                <p>BPM: {{ $song->bpm }}</p>
                                            </div>
                                        </div>
                                        <div class="progress-container">
                                            <div class="duration" id="duration-{{ $index }}"></div>
                                            <div id="waveform-{{ $index }}" class="waveform"></div>
                                            <div class="song-file">
                                                <a class="audio-element"
                                                    href="{{ asset('storage/' . $song->song_file) }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="controls">
                                <div class="control-btn side">
                                    <img src="{{ asset('static/images/backwards.svg') }}" alt="previous"
                                        id="previous">
                                </div>
                                <div class="control-btn" id="play-pause">
                                    <img src="{{ asset('static/images/play.svg') }}" alt="play-pause" id="playPause">
                                </div>
                                <div class="control-btn side">
                                    <img src="{{ asset('static/images/forwards.svg') }}" alt="next"
                                        id="next">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="playlist-wrapper">
                        <div class="playlist" id="playlist">
                            @foreach ($songs as $index => $song)
                                <a class="playlist-row" data-playlist-id="playlist-{{ $index }}">
                                    <h3>{{ $song->title }}</h3>
                                    <p>{{ $song->genre }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>




            <div class="about-me" id="about-me">
                <div class="text-about">
                    <h2>ABOUT ME</h2>
                    <p>
                        Hey there, welcome to my official page! <br>
                        I'm Marko, a beat maker and music producer from Belgrade, Serbia.
                        Ever since I was a young kid, hip-hop culture, especially its music, has had a massive impact on
                        me.
                        It all started back in 2000 when I took my first steps into the world of beat creation. After
                        finishing up high school, I decided to take my skills to the next level and pursued higher
                        education
                        at the esteemed Faculty of Music Arts in Belgrade. <br> <br>
                        It was in 2008 when I proudly graduated as a Sound Designer and Music Producer. Simultaneously,
                        I
                        embarked on a fulfilling professional path as a Sound Engineer at the renowned National
                        Television
                        of Serbia. From live music concerts to sports events, from films to TV dramas, I've had the
                        incredible opportunity to be part of it all. These experiences served as invaluable
                        opportunities
                        for honing my expertise and expanding my repertoire. <br> <br>
                        Today, I'm the proud owner of a professional music studio, where the magic happens. Within its
                        walls, I compose, record, mix, and master music, as well as undertake sound design and editing
                        for
                        commercials and podcasts. <br> <br>
                        I consider myself fortunate to have found a harmonious balance between my passion and my
                        profession.
                    </p>
                </div>
            </div>
        </main>
        <footer id="contact">
            <div class="contact_container">
                <div class="email_card">
                    <h1 class="contact_text">
                        So, if you're ready to level up your music game with custom hip-hop beats that'll make heads
                        turn,
                        hit me up. Let's create something special together and make your tracks stand out from the
                        crowd.
                        Get in touch today, and let's make magic happen!

                    </h1>
                    <div class="social_container">
                        <div class="social_media">
                            <div class="social_circle 1">
                                <img src="static/images/instagram.svg" alt="instagram">
                            </div>
                            <div class="social_circle 2">
                                <img src="static/images/unknown.svg" alt="still to decide">
                            </div>
                            <div class="social_circle 3">
                                <img src="static/images/unknown.svg" alt="still to decide">
                            </div>
                        </div>
                    </div>
                    <div class="email_form">
                        <form action="views/send_email.php" method="post" id="email_form">
                            <div class="input_container">
                                <label class="form_label" for="name">Name:</label>
                                <input class="form_input" placeholder="Type your full name here" type="text"
                                    name="name" id="name" required>
                            </div>

                            <div class="input_container">
                                <label class="form_label" for="email">Email:</label>
                                <input class="form_input" placeholder="Enter your email" type="email"
                                    id="email" name="email" required>
                            </div>
                            <div class="input_container">
                                <label class="form_label" for="message">Message:</label>
                                <textarea class="form_textarea" placeholder="Type your message here" id="message" name="message" required></textarea>
                            </div>

                            <button class="form_submit" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="static/js/navbar.js"></script>
    </div>
    <script type="module">
        import WaveSurfer from 'https://unpkg.com/wavesurfer.js@7/dist/wavesurfer.esm.js'
        window.addEventListener("load", function() {
            var loadingContainer = document.getElementById("loading-container");
            loadingContainer.style.display = "none";
        });

        var wavesurfers = [];

        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = Math.floor(seconds % 60);
            return minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
        }

        function initializeWaveSurfer(index, audioFile) {
            var containerId = 'waveform-' + index;
            var durationId = 'duration-' + index;
            var currentTimeId = 'currentTime-' + index;

            var existingWavesurfer = wavesurfers[index];
            if (existingWavesurfer) {
                return existingWavesurfer;
            }

            var container = document.getElementById(containerId);
            if (!container) {
                console.error('Container element not found:', containerId);
                return;
            }

            var wavesurfer = WaveSurfer.create({
                container: '#' + containerId,
                waveColor: '#ddd',
                progressColor: 'orange',
                barWidth: 2,
                cursorWidth: 1,
                responsive: true,
                height: 60
            });

            wavesurfer.on('ready', function() {
                var durationElement = document.getElementById(durationId);

                var duration = wavesurfer.getDuration();
                durationElement.textContent = '0:00/' + formatTime(duration);

                wavesurfer.on('audioprocess', function() {
                    var currentTime = wavesurfer.getCurrentTime();
                    durationElement.textContent = formatTime(currentTime) + '/' + formatTime(duration);
                });
            });

            wavesurfer.load(audioFile);

            wavesurfers[index] = wavesurfer;

            return wavesurfer;
        }



        function playPause() {
            var playPauseBtn = document.getElementById('playPause');
            var activeSongCard = document.querySelector('.song.active.playing');
            if (activeSongCard) {
                var index = parseInt(activeSongCard.getAttribute('data-playlist-id').split('-')[1]);
                var wavesurfer = wavesurfers[index];

                if (wavesurfer) {
                    if (wavesurfer.isPlaying()) {
                        wavesurfer.pause();
                        playPauseBtn.src = 'static/images/play.svg'; // Update the play button image
                    } else {
                        wavesurfer.play();
                        playPauseBtn.src = 'static/images/pause.svg'; // Update the pause button image

                        wavesurfer.on('finish', function() {
                            playPauseBtn.src =
                                'static/images/play.svg'; // Update the play button image when music finishes
                        });

                        wavesurfer.on('pause', function() {
                            playPauseBtn.src =
                                'static/images/play.svg'; // Update the play button image when music is paused
                        });

                        wavesurfer.on('stop', function() {
                            playPauseBtn.src =
                                'static/images/play.svg'; // Update the play button image when music is stopped
                        });
                    }
                }
            }
        }



        // Add an event listener to the play-pause element
        document.getElementById('play-pause').addEventListener('click', playPause);


        function loadMusic(index) {
            var activeSongCard = document.querySelector('.song.active.playing');
            if (activeSongCard) {
                activeSongCard.classList.remove('active');
                activeSongCard.classList.remove('playing');
            }

            var card = document.querySelector('[data-playlist-id="playlist-' + index + '"]');
            if (card) {
                card.classList.add('active');
                card.classList.add('playing');

                var audioFile = card.querySelector('.audio-element').href;

                var wavesurfer = initializeWaveSurfer(index, audioFile);
                if (wavesurfer) {
                    var activeSong = document.querySelector('.song.active.playing');
                    if (activeSong) {
                        wavesurfers.forEach(function(ws) {
                            if (ws !== wavesurfer) {
                                ws.pause();
                            }
                        });
                    }
                }
            } else {
                console.error('Card not found for index: ' + index);
            }
        }


        function loadActiveSongCard(index) {
            var activeSongCard = document.querySelector('.song.active.playing');
            if (activeSongCard) {
                activeSongCard.classList.remove('active');
                activeSongCard.classList.remove('playing');

                var previousIndex = parseInt(activeSongCard.getAttribute('data-playlist-id').split('-')[1]);
                var previousPlaylistRow = document.querySelector('.playlist-row[data-playlist-id="playlist-' +
                    previousIndex + '"]');
                if (previousPlaylistRow) {
                    previousPlaylistRow.classList.remove('selected');
                }
            }

            var card = document.querySelector('.song[data-playlist-id="playlist-' + index + '"]');
            if (card) {
                card.classList.add('active');
                card.classList.add('playing');
                var audioFile = card.querySelector('.audio-element').href;

                // Show the loader
                var loader = document.querySelector('.spinner');
                loader.style.display = 'grid';

                var wavesurfer = initializeWaveSurfer(index, audioFile);
                wavesurfer.on('ready', function() {
                    // Hide the loader
                    loader.style.display = 'none';
                });

                var playlistRow = document.querySelector('.playlist-row[data-playlist-id="playlist-' + index + '"]');
                if (playlistRow) {
                    playlistRow.classList.add('selected');
                }
            } else {
                console.error('Card not found for index: ' + index);
            }
        }


        // Call the function to load the first song by default
        loadActiveSongCard(0);


        function showSong(index) {
            loadActiveSongCard(index);
            loadMusic(index);
        }


        document.addEventListener('DOMContentLoaded', function() {
            var playlistRows = document.getElementsByClassName('playlist-row');
            for (var i = 0; i < playlistRows.length; i++) {
                playlistRows[i].addEventListener('click', function() {
                    var playlistId = this.dataset.playlistId;
                    if (playlistId) {
                        var index = parseInt(playlistId.split('-')[1]);
                        showSong(index);
                    }
                });
            }
        });

        function handlePreviousButtonClick() {
            var activeSongCard = document.querySelector('.song.active.playing');
            if (activeSongCard) {
                var currentIndex = parseInt(activeSongCard.getAttribute('data-playlist-id').split('-')[1]);
                var previousIndex = currentIndex - 1;
                if (previousIndex < 0) {
                    previousIndex = document.querySelectorAll('.song').length - 1;
                }
                showSong(previousIndex);
            }
        }

        function handleNextButtonClick() {
            var activeSongCard = document.querySelector('.song.active.playing');
            if (activeSongCard) {
                var currentIndex = parseInt(activeSongCard.getAttribute('data-playlist-id').split('-')[1]);
                var nextIndex = currentIndex + 1;
                if (nextIndex >= document.querySelectorAll('.song').length) {
                    nextIndex = 0;
                }
                showSong(nextIndex);
            }
        }

        document.getElementById('previous').addEventListener('click', handlePreviousButtonClick);
        document.getElementById('next').addEventListener('click', handleNextButtonClick);
    </script>
</body>

</html>
