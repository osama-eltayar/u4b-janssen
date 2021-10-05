<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/fonts.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>U4P</title>
</head>

<body class="main-page">

<div class="main-container d-flex justify-content-between flex-grow-1">

    <div class="hand-left">
        <img src="/assets/images/hand-left.png" class="img-fluid" alt="">
        <img src="/assets/images/date.svg" class="img-fluid ms-4 mb-4" alt="">
    </div>

    <div class="center-content">
        <div class="canvas-container">
            <canvas id="canvas" class="frame-canvas"></canvas>
            <button class="btn edit-btn">
                <img src="/assets/images/edit-btn.svg" class="img-fluid" alt="">
            </button>
        </div>
        <div class="action-btns">
            <button class="btn access-cam-btn">
                <img src="/assets/images/access-cam-btn.svg" class="img-fluid" alt="">
            </button>
            <button class="btn gallery-btn">
                <img src="/assets/images/gallery-btn.svg" class="img-fluid" alt="">
            </button>
        </div>
        <button class="btn save-btn">
            <img src="/assets/images/save-btn.svg" class="img-fluid" alt="">
        </button>

    </div>


    <div class="hand-right">
        <img src="/assets/images/hand-right.png" class="img-fluid" alt="">
    </div>

</div>

<input type="file" name="camera_input" style="visibility: hidden" id="camera-input" capture="user">
<input type="file" name="gallery_input" style="visibility: hidden" id="gallery-input">


<!-- thank you -->
<div class="thankyou">
    <div class="container">
        <img src="/assets/images/thank-you.svg" alt="">
    </div>
</div>

<!-- scripts -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
<script>
    $('.access-cam-btn').on('click',function (){
        $('#camera-input').click();
    });

    $('.gallery-btn').on('click',function (){
        $('#gallery-input').click();
    });


</script>
</body>

</html>
