<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook tests</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css?v=<?= time() ?>">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/custom.css?v=<?= time() ?>">
</head>

<body class="upload_body">
    <!-- Form to upload the files -->
    <form class="upload" method="post" action="" enctype="multipart/form-data" novalidate="">
        <!-- The `input` of type `file` -->
        <input class="upload__input" name="files[]" type="file" multiple="" />
        <!-- The `canvas` element to draw the particles -->
        <canvas class="upload__canvas"></canvas>
        <!-- The upload icon -->
        <div class="upload__icon">
            <svg viewBox="0 0 470 470">
                <path d="m158.7 177.15 62.8-62.8v273.9c0 7.5 6 13.5 13.5 13.5s13.5-6 13.5-13.5v-273.9l62.8 62.8c2.6 2.6 6.1 4 9.5 4 3.5 0 6.9-1.3 9.5-4 5.3-5.3 5.3-13.8 0-19.1l-85.8-85.8c-2.5-2.5-6-4-9.5-4-3.6 0-7 1.4-9.5 4l-85.8 85.8c-5.3 5.3-5.3 13.8 0 19.1 5.2 5.2 13.8 5.2 19 0z"></path>
            </svg>
        </div>
        <div id="info"></div>
    </form>

    <script src="../../js/jquery.min.js?v=<?= time() ?>"></script>
    <script src="../../js/anime.js?v=<?= time() ?>"></script>
    <script src="../../js/upload.js?v=<?= time() ?>"></script>
</body>

</html>