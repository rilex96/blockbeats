@extends('songComponents.crudlayout')

@section('content')
    <div class="container">
        <a class="home_link" href="/"><img src="{{ asset('static/images/home.svg') }}" alt="home"></a>
        <a class="mobile_home_link" href="/"><img src="{{ asset('static/images/home.svg') }}" alt="home"></a>
        <form action="/" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="input-box" type="hidden" name="id" id="id">
            <div class="file-input">
                <label for="song_file" id="file-label-1" class="drop-container">
                    <img src="{{ asset('static/images/upload.svg') }}" alt=""> &nbsp; Choose Or Drop Music File
                    <input type="file" name="song_file" id="song_file" accept="audio/*" required>
                </label>
                <div id="music-file-name"></div>
            </div>

            <div class="file-input">
                <label for="song_image" id="file-label-2" class="drop-container">
                    <img src="{{ asset('static/images/upload.svg') }}" alt=""> &nbsp; Choose Or Drop Image File
                    <input type="file" name="image_file" id="image_file" accept="image/*" required>
                </label>
                <div id="image-file-name"></div>
            </div>

            <div class="input-box">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="input-box">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" required>
            </div>
            <div class="input-box">
                <label for="bpm">BPM:</label>
                <input type="text" name="bpm" id="bpm" required>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
