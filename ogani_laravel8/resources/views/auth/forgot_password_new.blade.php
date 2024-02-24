@extends('layouts.auth_layout')

@section('content')

    <img class="wave" src="{{ asset('auth-assets/img/wave-purple.svg') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('auth-assets/img/auth-3d-purple/4.png') }}">
        </div>
        <div class="login-container">
            <form action="index.html">
                <h2 class="animation-text" id="text1"><b style="color:green;">Forgot Password</b> </h2>
                <h2 class="animation-text" id="text2"><b style="color:green;">ほんじつのあいことば </b></h2>
                <p>Enter your e-mail address in the field below</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>E-mail</h5>
                        <input class="input" type="email">
                    </div>
                </div>
                <input type="submit" class="btn" value="Send">
                <div class="account">
                    <p>Have An Account ?</p>
                    <a href="/login-new">Login</a>
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
