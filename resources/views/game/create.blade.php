<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/game-assets/images/favicon.png" type="image/x-icon">
    <title>Memory Game</title>
    <link rel="stylesheet" href="/game-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/game-assets/fonts/fonts.css">
    <link rel="stylesheet" href="/game-assets/css/customAnimation.css">
    <link rel="stylesheet" href="/game-assets/css/style.css">
    <link rel="stylesheet" href="/game-assets/css/game.css">
    <link rel="stylesheet" href="/assets/css/loading.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

<!-- login-page -->
<main class="login-page">
    <div class="main-container">
        <div class="content">
            <form class="login-form" action="{{route('games.store')}}" method="post">
                <div class="form-group game-name">
                    <img src="/game-assets/images/game-title.svg" alt="" />
                </div>

                <div class="form-group input-field">

                    <input id="fullname" name="name"  required placeholder="User Name" type="text" />
                </div>

                <div class="form-group input-field">
                    <input id="email" type="email" required placeholder="Email"  name="email"/>
                </div>
                <div class="form-group input-field">
                    <div class="custom-select">
                        <select name="country_id" required>
                            <option  >Region</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="login-btn">
                        <img src="/game-assets/images/login-btn.svg" alt="" />
                    </button>
                </div>
            </form>

        </div>
    </div>
    <!-- footer -->
    <footer class="footer">
        <div class="logo-bottom">
            <img src="/game-assets/images/janssin-logo.svg" class="img-fluid" alt="">
        </div>
    </footer>
</main>



<!-- game-page -->
<main id="game" class="game-page">
    <div class="score-container">
        <img src="/game-assets/images/game/score-img.svg" alt="" class="img-fluid">
        <div  class="score">
            12 /
            <span id="score"> 0</span>
        </div>
    </div>
    <div class="time-container">
        <img src="/game-assets/images/game/time-img.svg" alt="" class="img-fluid">
        <div id="timer-num" class="time">
            <span class="minuts">03</span>:<span class="seconds">46</span>
        </div>
    </div>
    <section class="memory-game">
        <div class="memory-card" data-framework="country1">
            <img class="front-face" src="/game-assets/images/game/country1.png" alt="country1" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country1">
            <img class="front-face" src="/game-assets/images/game/country1.png" alt="country1" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country2">
            <img class="front-face" src="/game-assets/images/game/country2.png" alt="country2" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country2">
            <img class="front-face" src="/game-assets/images/game/country2.png" alt="country2" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country3">
            <img class="front-face" src="/game-assets/images/game/country3.png" alt="country3" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country3">
            <img class="front-face" src="/game-assets/images/game/country3.png" alt="country3" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country4">
            <img class="front-face" src="/game-assets/images/game/country4.png" alt="country4" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country4">
            <img class="front-face" src="/game-assets/images/game/country4.png" alt="country4" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country5">
            <img class="front-face" src="/game-assets/images/game/country5.png" alt="country5" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country5">
            <img class="front-face" src="/game-assets/images/game/country5.png" alt="country5" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country6">
            <img class="front-face" src="/game-assets/images/game/country6.png" alt="country6" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country6">
            <img class="front-face" src="/game-assets/images/game/country6.png" alt="country6" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country7">
            <img class="front-face" src="/game-assets/images/game/country7.png" alt="country7" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country7">
            <img class="front-face" src="/game-assets/images/game/country7.png" alt="country7" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country8">
            <img class="front-face" src="/game-assets/images/game/country8.png" alt="country8" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country8">
            <img class="front-face" src="/game-assets/images/game/country8.png" alt="country8" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country9">
            <img class="front-face" src="/game-assets/images/game/country9.png" alt="country9" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country9">
            <img class="front-face" src="/game-assets/images/game/country9.png" alt="country9" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country10">
            <img class="front-face" src="/game-assets/images/game/country10.png" alt="country10" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country10">
            <img class="front-face" src="/game-assets/images/game/country10.png" alt="country10" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country11">
            <img class="front-face" src="/game-assets/images/game/country11.png" alt="country11" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country11">
            <img class="front-face" src="/game-assets/images/game/country11.png" alt="country11" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>

        <div class="memory-card" data-framework="country12">
            <img class="front-face" src="/game-assets/images/game/country12.png" alt="country12" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>
        <div class="memory-card" data-framework="country12">
            <img class="front-face" src="/game-assets/images/game/country12.png" alt="country12" />
            <img class="back-face" src="/game-assets/images/game/front-img.png" alt="front-img" />
        </div>


        <!-- title -->
        <div class="game-title">
            <img src="/game-assets/images/game-title.svg" class="img-fluid" alt="">
        </div>
    </section>
    <!-- frame-img -->
    <section class="memory-game frame-img">
        <img src="/game-assets/images/game/frame-img.svg" class="img-fluid" alt="">
    </section>

    <!-- win popup -->
    <section class="win-popup game-popup">
        <div class="popup-img">
            <img src="/game-assets/images/game/completed.svg" alt="" class="img-fluid">
        </div>
    </section>

    <!-- gameover popup -->
    <section class="gameover-popup game-popup">
        <div class="popup-img">
            <img src="/game-assets/images/game/gameover.svg" alt="" class="img-fluid">
            <div class="text-center">
                <button id="try-again" class="btn try-again">
                    <img src="/game-assets/images/game/tryAgain-btn.svg" class="img-fluid"  alt="">
                </button>
            </div>
        </div>
    </section>
</main>

<audio id="background">
    <source src="/game-assets/sounds/background.mp3" type="audio/mpeg">
</audio>
<audio id="correct">
    <source src="/game-assets/sounds/correct.mp3" type="audio/mpeg">
</audio>
<audio id="win">
    <source src="/game-assets/sounds/win.mp3" type="audio/mpeg">
</audio>
<audio id="lose">
    <source src="/game-assets/sounds/lose.mp3" type="audio/mpeg">
</audio>


<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- scripts -->
<script>
    let submitScoreUrl = "{{route('games.update','xxx')}}"
</script>
<script src="/game-assets/js/jquery.min.js"></script>
<script src="/game-assets/js/popper.min.js"></script>
<script src="/game-assets/js/bootstrap.min.js"></script>
<script src="/game-assets/js/main.js"></script>
<script src="/game-assets/js/game.js"></script>
<script src="/game-assets/js/addtional.js"></script>
<script src="/assets/js/ajax.js"></script>

</body>

</html>
