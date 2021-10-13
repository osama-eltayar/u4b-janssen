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

<body class="login-page">
<div class="login-img">
    <img src="/assets/images/login-img.png" alt="">
</div>

<!-- form -->
<div class="form-container">
    <form class="login-form" method="post" action="{{route('register')}}">
        @csrf
        <!-- username -->
        <div class="form-group d-flex align-items-start justify-content-start">
            <label for="username">Username</label>
            <div class="ms-2 input-container">
                <input type="text" class="form-control" id="username" name="name" required>
            </div>
            @error('name')
            <span class="">{{$message}}</span>
            @enderror
        </div>

        <!-- email -->
        <div class="form-group d-flex align-items-start justify-content-start">
            <label for="email">Email</label>
            <div class="ms-2 input-container">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            @error('email')
            <span class="">{{$message}}</span>
            @enderror
        </div>

        <!-- country -->
        <div class="form-group d-flex align-items-start justify-content-start">
            <label for="country">Region</label>
            <div class="ms-2 input-container">
                <select class="form-select" aria-label="Default select example" id="country" name="country_id" required>
                    <option selected></option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('country_id')
            <span class="">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group d-flex align-items-start justify-content-start">
            <label for="aspiration">Therapy</label>
            <div class="ms-2 input-container">
                <select class="form-select" aria-label="Default select example" id="therapy" name="therapy_id" required>
                    <option selected></option>
                    @foreach($therapies as $therapy)
                        <option value="{{$therapy->id}}">{{$therapy->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('therapy_id')
            <span class="">{{$message}}</span>
            @enderror
        </div>

        <!-- aspiration -->
        <div class="form-group d-flex align-items-start justify-content-start">
            <label for="aspiration">Aspiration</label>
            <div class="ms-2 input-container">
                <select class="form-select" aria-label="Default select example" id="aspiration" name="aspiration_id" required>
                    <option selected></option>
                    @foreach($aspirations as $aspiration)
                    <option value="{{$aspiration->id}}">{{$aspiration->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('aspiration_id')
            <span class="">{{$message}}</span>
            @enderror
        </div>

        <!-- login button -->
        <button type="submit" class="btn login-btn">
            <img src="/assets/images/login-btn.svg" class="img-fluid" alt="login-btn">
        </button>
    </form>
</div>



<!-- scripts -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>

</html>
