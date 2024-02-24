@extends('layouts.auth_layout')

@section('content')
<img class="wave" src="{{ asset('auth-assets/img/wave-purple.svg')}}">
<div class="container">
    <div class="img">
        <img src="{{ asset('auth-assets/img/auth-3d-purple/2.png')}}">
    </div>
    <div class="login-container">
        <form action="success-new">
            <div class="animation-container">
                <h2 class="animation-text" id="text1"><b style="color:green;">Register Page</b> </h2>
                <h2 class="animation-text" id="text2"><b style="color:green;">れじすたーぺーじ</b> </h2>
            </div>
            <p>Register with other social medias:</p>
            <div class="social">
                <div class="social-icons google">
                    <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-gmail.png')}}">Login with Google</a>
                </div>
                <div class="social-icons facebook">
                    <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-facebook.png')}}">Login with Facebook</a>
                </div>
                <div class="social-icons github">
                    <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-github.png')}}">Login with Github</a>
                </div>
                <div class="social-icons twitter">
                    <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-twitter.png')}}">Login with Twitter</a>
                </div>
                <div class="social-icons discord">
                    <a href="#"><img src="{{ asset('auth-assets/img/3d-icon/3d-icon-discord.png')}}">Login with Discord</a>
                </div>
            </div>
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
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>E-mail</h5>
                    <input class="input" type="email">
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-key"></i>
                </div>
                <div>
                    <h5>Password</h5>
                    <input class="input" type="password">
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-key"></i>
                </div>
                <div>
                    <h5>Password Confirm</h5>
                    <input class="input" type="password">
                </div>
            </div>
            <div class="terms">
                <input type="checkbox">
                <label>I have read and accept the terms of </label><a id="action-modal">service and privacy policy.</a>
            </div>
            <div class="btn-container">
                <a href="/success-new" class="btn-action">Register</a>
            </div>
            <div class="account">
                <p>Have An Account ?</p>
                <a href="login-new">Login</a>
            </div>
            <!-- The Modal -->
            <div id="modal-terms" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Terms and Services</h2>
                    <p>Welcome to our platform! By accessing or using our services, you agree to comply with and be bound by the following terms and conditions:</p>
                    <p>1. You must be at least 18 years old to use our services.</p>
                    <p>2. Respect the privacy of others and refrain from sharing personal information without consent.</p>
                    <p>3. Use our platform responsibly and refrain from engaging in any illegal or harmful activities.</p>
                    <p>4. Content shared on our platform should adhere to community guidelines and not violate intellectual property rights.</p>
                    <p>5. We reserve the right to suspend or terminate your account if you violate any of our terms.</p>
                    <p>6. Our services may include third-party content; be aware of their terms and policies as well.</p>
                    <p>7. We may update or modify these terms; check this page regularly for any changes.</p>
                    <p>Thank you for using our services responsibly. If you have any questions, please contact our support team.</p>
                </div>
                
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
