@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<main class="position-relative register full-height">
    <a href="{{ route('home.index') }}" class="position-absolute btn-auth-back"><i class="bi bi-arrow-left-circle"></i></a>
    <div class="d-flex flex-wrap align-items-center justify-content-center flex-column">
        <div class="group wrap-register">

            @if ($errors->any())
            <div class="alert alert-danger m-0 mb-2 py-1" role="alert">
                <ul class="m-0 px-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="d-flex flex-wrap gap-3 flex-column">
                    <div class="form-floating">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required="" autocomplete="off" placeholder="Email address" readonly="">
                        <label for="email">{{ __('Email address') }}</label>
                    </div>


                    <div class="form-floating">
                        <input id="password" type="password" class="password form-control @error('password') is-invalid @enderror" name="password" required="" autocomplete="new-password" placeholder="Password" autofocus="">
                        <label for="password">{{ __('Password') }}</label>
                    </div>


                    <div class="form-floating">
                        <input id="password-confirm" type="password" class="password form-control" name="password_confirmation" required="" autocomplete="new-password" placeholder="Password confirmation">
                        <label for="password-confirm">{{ __('Password confirmation') }}</label>
                    </div>

                    <div class="d-flex flex-wrap align-items-start justify-content-between">
                        <div class="group d-flex flex-wrap align-items-center gap-1 password-container">
                            <input type="checkbox" value="remember-me" id="checkPassword" onchange="showChar(event)">
                            <label for="checkPassword" class="pointered"><i class="bi bi-eye"></i></label>
                        </div>
                        <button type="submit" class="btn btn-color btn-sm px-3 py-2 btn-shadow" onclick="showLoading()">{{ __('Reset') }}<i class="bi bi-key ms-3"></i></button>
                    </div>
                </div>
            </form>

            @guest
            <div class="text-center linen">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="dotted turbided">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="dotted turbided">{{ __('Register') }}</a>
                @endif
            </div>
            @endguest
        </div>
    </div>
</main>
@endsection
