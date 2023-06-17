@extends('layouts.app')
@section('title', 'Register')

@section('content')
<main class="position-relative register full-height">
    <a href="{{ route('home.index') }}" class="position-absolute btn-auth-back"><i class="bi bi-arrow-left-circle"></i></a>
    <div class="d-flex flex-wrap align-items-center justify-content-center flex-column">
        <div class="group wrap-register">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input id="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus="" required="" placeholder="Name">

            <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required="" autocomplete="off">

            <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror password" name="password" placeholder="Password" autocomplete="new-password" required="">

            <input id="password-confirm" type="password" class="form-control mb-2 password" name="password_confirmation" placeholder="Password confirmation" autocomplete="new-password" required="">

            <div class="d-flex flex-wrap align-items-start justify-content-between">
                <div class="group d-flex flex-wrap align-items-center gap-1">
                    <input type="checkbox" value="remember-me" id="checkPassword" onchange="showChar(event)">
                    <label for="checkPassword">Show password</label>
                </div>
                <button type="submit" class="btn btn-color btn-sm px-3">{{ __('Register') }}<i class="bi bi-key ms-3"></i></button>
            </div>
        </form>
        @guest
            @if (Route::has('login'))
            <div class="text-center linen">
                <a href="{{ route('login') }}" class="dotted turbided">{{ __('Login') }}</a>
            </div>
            @endif
        @endguest
        </div>
    </div>
</main>
@endsection
