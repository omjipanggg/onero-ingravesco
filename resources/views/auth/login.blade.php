@extends('layouts.app')
@section('title', 'Login')

@section('content')
<main class="login full-height position-relative">
    <a href="{{ route('home.index') }}" class="position-absolute btn-auth-back"><i class="bi bi-arrow-left-circle"></i></a>
    <div class="d-flex flex-wrap align-items-center justify-content-center flex-column">
        <div class="group wrap-login">

        @if ($errors->any())
        <div class="alert alert-danger m-0 mb-2 py-2" role="alert">
            <ul class="m-0 px-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" required="" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email address" autofocus="">
              <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-3 @error('password') error @enderror">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror password" name="password" placeholder="Password" autocomplete="current-password">
              <label for="password">Password</label>
              {{-- <button class="position-absolute btn btn-eye" type="submit"><i class="bi bi-arrow-right-circle"></i></button> --}}
            </div>

            {{--
            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            --}}

            <div class="d-flex flex-wrap align-items-start justify-content-between">
                <div class="group d-flex flex-wrap align-items-center gap-1 password-container">
                    <input type="checkbox" value="remember-me" id="checkPassword" onchange="showChar(event)">
                    <label for="checkPassword" class="pointered"><i class="bi bi-eye"></i></label>
                </div>
                <button type="submit" class="btn btn-color btn-sm px-3 py-2 btn-shadow" onclick="showLoading()">{{ __('Login') }}<i class="bi bi-key ms-3"></i></button>
            </div>
        </form>
        @guest
            <div class="text-center linen">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="dotted turbided">{{ __('Register') }}</a>
            @endif
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="dotted turbided">{{ __('Reset') }}</a>
            @endif
            </div>
        @endguest
        </div>
    </div>
</main>
@endsection