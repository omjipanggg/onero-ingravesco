@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<main class="position-relative register full-height">
    <a href="{{ route('home.index') }}" class="position-absolute btn-auth-back"><i class="bi bi-arrow-left-circle"></i></a>
    <div class="d-flex flex-wrap align-items-center justify-content-center flex-column">
        <div class="group wrap-verify">

        @if ($errors->any())
        <div class="alert alert-danger m-0 mb-2 py-1" role="alert">
            <ul class="m-0 px-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success mb-2" role="alert">
                <i class="bi bi-info-circle me-2"></i><strong>Info!</strong> {{ session('status') }}
            </div>
        @endif

         <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="d-flex flex-wrap gap-3">
                <div class="form-floating flex-fill">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" autocomplete="email" autofocus="" placeholder="Email address">
                    <label for="email">{{ __('Email address') }}</label>
                </div>
                <button type="submit" class="btn btn-color btn-sm px-3 py-2 btn-shadow" onclick="showLoading()">{{ __('Send') }}<i class="bi bi-envelope ms-3"></i></button>
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