<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Song</title>
    <link rel="stylesheet" href="static/css/upload.css">
</head>

<body>
    <div class="container">
        <a class="home_link" href="index.php"><img src="static/images/home.svg" alt="home"></a>
        <a class="mobile_home_link" href="index.php"><img src="static/images/home.svg" alt="home"></a>
        <form action="/" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="input-box" type="hidden" name="id" id="id">
            <div class="file-input">
                <label for="song_file" id="file-label-1" class="drop-container">
                    <img src="static/images/upload.svg" alt=""> &nbsp; Choose Or Drop Music File
                    <input type="file" name="song_file" id="song_file" accept=".mp3,.wav" required>
                </label>
                <div id="music-file-name"></div>
            </div>

            <div class="file-input">
                <label for="song_image" id="file-label-2" class="drop-container">
                    <img src="static/images/upload.svg" alt=""> &nbsp; Choose Or Drop Image File
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

    <script>
        var musicFile = document.getElementById('file-label-1');
        var musicInput = document.getElementById('song_file');
        var imageFile = document.getElementById('file-label-2');
        var imageInput = document.getElementById('song_image');

        var musicFileName = document.getElementById('music-file-name');
        var imageFileName = document.getElementById('image-file-name');

        musicInput.addEventListener('change', (event) => {
            const files = event.target.files;
            if (files.length > 0) {
                musicFileName.innerText = files[0].name;
            } else {
                musicFileName.innerText = 'No file chosen';
            }
        });

        imageInput.addEventListener('change', (event) => {
            const files = event.target.files;
            if (files.length > 0) {
                imageFileName.innerText = files[0].name;
            } else {
                imageFileName.innerText = 'No file chosen';
            }
        });
    </script>
</body>

</html>
