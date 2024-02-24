@extends('layouts.auth_layout')

@section('content')
    <img class="wave" src="{{ asset('auth-assets/img/wave-purple.svg') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('auth-assets/img/auth-3d-purple/1.png') }}">
        </div>
        <div class="login-container">
            <form action="/dashboard">
                <h2 class="animation-text" id="text1">Welcome to <b style="color:green;">Ogani</b> </h2>
                <h2 class="animation-text" id="text2"><b style="color:green;">おがに</b> へ ようこそ </h2>
                <p>Please Login</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
                <a class="forgot" href="register-new">Don't have an acount ? , Click here to Register</a>
                <div class="others">
                    <hr>
                    <p>OR</p>
                    <hr>
                </div>
                <div class="social">
                    <div class="social-icons google">
                        <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-gmail.png') }}">Login with Google</a>
                    </div>
                    <div class="social-icons facebook">
                        <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-facebook.png') }}">Login with Facebook</a>
                    </div>
                    <div class="social-icons github">
                        <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-github.png') }}">Login with Github</a>
                    </div>
                    <div class="social-icons twitter">
                        <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-twitter.png') }}">Login with Twitter</a>
                    </div>
                    <div class="social-icons discord">
                        <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-discord.png') }}">Login with Discord</a>
                    </div>
                </div>
                <div class="account">
                    <p>Forgot Password ?</p>
                    <a href="forgot-password-new">Click Here</a>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the two h1 elements
            const text1 = document.getElementById("text1");
            const text2 = document.getElementById("text2");

            // Set initial visibility
            text1.style.display = "block";
            text2.style.display = "none";

            // Start the animation
            setInterval(function () {
                // Toggle visibility of the two h1 elements
                text1.style.display = (text1.style.display === "block") ? "none" : "block";
                text2.style.display = (text2.style.display === "none") ? "block" : "none";
            }, 2000); // Change every 2 seconds
        });
    </script>
@endpush
