@extends('songComponents.crudlayout')
@section('content')
    <div class="container">
        <a class="home_link" href="/"><img src="{{ asset('static/images/home.svg') }}" alt="home"></a>
        <a class="mobile_home_link" href="/"><img src="{{ asset('static/images/home.svg') }}" alt="home"></a>
        <form action="/song/{{ $song->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="file-input">
                <label for="song_file" id="file-label-1" class="drop-container">
                    <img src="{{ asset('static/images/upload.svg') }}" alt=""> &nbsp; Choose Or Drop Music File
                    <input type="file" name="song_file" id="song_file" accept="audio/*"
                        value="/storage/{{ $song->song_file }}">
                </label>
                <audio src="/storage/{{ $song->song_file }}" controls></audio>
                <div id="music-file-name"></div>
            </div>

            <div class="file-input">
                <label for="song_image" id="file-label-2" class="drop-container">
                    <img src="{{ asset('static/images/upload.svg') }}" alt=""> &nbsp; Choose Or Drop Image File
                    <input type="file" name="image_file" id="image_file" accept="image/*"
                        value="/storage/{{ $song->image_file }}">

                </label>
                <div id="image-file-name"></div>
                <img src="/storage/{{ $song->image_file }}" alt="" style="width: 200px; height:auto;">
            </div>

            <div class="input-box">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ $song->title }}" required>
            </div>
            <div class="input-box">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" value="{{ $song->genre }}" required>
            </div>
            <div class="input-box">
                <label for="bpm">BPM:</label>
                <input type="text" name="bpm" id="bpm" value="{{ $song->bpm }}" required>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
