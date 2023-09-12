<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Song</title>
    <link rel="stylesheet" href="{{ asset('static/css/upload.css') }}">
</head>

<body>
    @yield('content')


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
