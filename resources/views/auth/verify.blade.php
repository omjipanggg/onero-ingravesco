@extends('layouts.app')
@section('title', 'Verification')

@section('content')
<main class="position-relative verify full-height">
    <a href="{{ route('home.index') }}" class="position-absolute btn-auth-back"><i class="bi bi-arrow-left-circle"></i></a>
    <div class="d-flex flex-wrap align-items-center justify-content-center flex-column">
        <div class="group wrap wrap-verify">
            @if (session('resent'))
                <div class="alert alert-success py-2" role="alert">
                    <i class="bi bi-check-circle me-2"></i><strong>Resent!</strong> Take your time to check again.
                </div>
            @endif

            <div class="text-center">
            {{ __('In order to continue your journey, please check your email address for an activation link we already sent for your account, or ') }}
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline dotted" onclick="showLoading()">{{ __('click here') }}</button>
            </form>
            {{ __(' to request another.') }}
            </div>
        </div>
    </div>

    @if (Route::has('logout'))
    <div class="text-center linen">
        <a href="{{ route('logout') }}" class="dotted turbided" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    @endif
</main>
@endsection
