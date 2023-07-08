@extends('layouts.app')
@section('title', 'Register')

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="d-flex flex-wrap gap-3 mb-3">
            <div class="form-floating flex-fill">
            <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus="" required="" placeholder="Name">
            <label for="name">Name</label>
            </div>


            <div class="form-floating flex-fill">
            <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required="" autocomplete="off">
            <label for="email">Email address</label>
            </div>
            </div>

            <div class="form-floating">
            <input id="password" type="password" class="form-control form-control-sm mb-3 @error('password') is-invalid @enderror password" name="password" placeholder="Password" autocomplete="new-password" required="">
            <label for="password">Password</label>
            </div>

            <div class="form-floating">
            <input id="password-confirm" type="password" class="form-control form-control-sm mb-3 password" name="password_confirmation" placeholder="Password confirmation" autocomplete="new-password" required="">
            <label for="password-confirm">Password confirmation</label>
            </div>

            <div class="d-flex flex-wrap align-items-start justify-content-between">
                <div class="group d-flex flex-wrap align-items-center gap-1 password-container">
                    <input type="checkbox" value="remember-me" id="checkPassword" onchange="showChar(event)">
                    <label for="checkPassword" class="pointered"><i class="bi bi-eye"></i></label>
                </div>
                <button type="submit" class="btn btn-color btn-sm px-3 py-2 btn-shadow" onclick="showLoading()">{{ __('Register') }}<i class="bi bi-key ms-3"></i></button>
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
