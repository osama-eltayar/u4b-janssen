<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/fonts.css">
    <link rel="stylesheet" href="/assets/css/count-down.css">
    <link rel="stylesheet" href="/assets/css/loading.css">
    <title>U4P</title>
</head>

<body class="countdown">
<div class="main-container d-flex justify-content-between flex-grow-1">
    <div class="hand-left">
        <img src="/assets/images/countdown/hand-left.png" class="img-fluid" alt="">
        <img src="/assets/images/date.svg" class="img-fluid ms-4 mb-4" alt="">
    </div>

    <div class="center-content">
        <div class="w-100 mt-auto text-center d-flex flex-column justify-content-center  align-items-center ">
            <div class="thankYou-text">
                <img class="img-fluid" src="/assets/images/countdown/thankYou.svg" alt="">
            </div>
            <div class="con-of-count d-flex justify-content-center align-items-center h-100">
                <div class="con-of-days">
                    <div class="wrapper">
                        <img class="img-fluid" src="/assets/images/countdown/count-img.svg">
                        <span class="number" id="day"></span>
                    </div>
                    <p class="text">Days</p>
                </div>
                <div class="con-of-hours">
                    <div class="wrapper">
                        <img class="img-fluid" src="/assets/images/countdown/count-img.svg">
                        <span class="number" id="hour"></span>
                    </div>
                    <p class="text">Hours</p>
                </div>
                <div class="con-of-mins">
                    <div class="wrapper">
                        <img class="img-fluid" src="/assets/images/countdown/count-img.svg">
                        <span class="number" id="min"></span>
                    </div>
                    <p class="text">Minutes</p>
                </div>
                <div class="con-of-sec">
                    <div class="wrapper">
                        <img class="img-fluid" src="/assets/images/countdown/count-img.svg">
                        <span class="number" id="sec"></span>
                    </div>
                    <p class="text">Seconds</p>
                </div>
            </div>
        </div>

        <button class="btn join-btn" id="join">
            <img src="/assets/images/countdown/join-btn.svg" class="img-fluid" alt="">
        </button>
        <a class="btn frame-link" href="{{route('images.create')}}">
            <img src="/assets/images/countdown/frame-link.svg" class="img-fluid" alt="">
        </a>
    </div>


    <div class="hand-right">
        <img src="/assets/images/countdown/hand-right.png" class="img-fluid" alt="">
    </div>

</div>





<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- scripts -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/count-down.js"></script>


</body>

</html>
