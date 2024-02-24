@extends('layouts.auth_layout')

@section('content')

    <img class="wave" src="{{ asset('auth-assets/img/wave-purple.svg') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('auth-assets/img/auth-3d-purple/5.png') }}">
        </div>
        <div class="confirm-container">
            <div class="content">
                <h2>Unable to register or Login</h2>
                <i class="fas fa-exclamation-circle"></i>
                <div class="btn-container">
                    <a href="index.html" class="btn-action">Try again</a>
                </div>
            </div>
        </div>
    </div>

@endsection
