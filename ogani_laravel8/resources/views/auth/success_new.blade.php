@extends('layouts.auth_layout')

@section('content')

    <img class="wave" src="{{ asset('auth-assets/img/wave-purple.svg') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('auth-assets/img/auth-3d-purple/3.png') }}">
        </div>
        <div class="confirm-container">
            <div class="content">
                <h2>Registration successful !</h2>
                <i class="far fa-check-circle"></i>
                <div class="btn-container">
                    <a href="error-new" class="btn-action">login</a>
                </div>
            </div>
        </div>
    </div>

@endsection
