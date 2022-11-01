<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('colorib/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('colorib/css/style.css') }}">

    <script src="https://kit.fontawesome.com/bc2d8b57a2.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main">


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('image/udangfix.png') }}" alt="sing up image"></figure>
                        {{-- <a href="{{route('register')}}" class="signup-image-link">Create an account</a> --}}
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="" name="username" id="username"
                                    placeholder="login with username or email" />
                                @error('username')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class="" name="password" id="your_pass"
                                    placeholder="Password" />
                                @error('password')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group align-items-end">
                                <a href="{{route('password.reset')}}"><p>Lupa Password</p></a>
                            </div>
                            <div class="form-group">
                                <p>Register</p>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit"
                                    onclick="lsRememberMe()" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


</body>
<script>
    const rmCheck = document.getElementById("remember-me"),
        emailInput = document.getElementById("username");

    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
    }

    function lsRememberMe() {
        if (rmCheck.checked && emailInput.value !== "") {
            localStorage.username = emailInput.value;
            localStorage.checkbox = rmCheck.value;
        } else {
            localStorage.username = "";
            localStorage.checkbox = "";
        }
    }
</script>

</html>
