@extends('layouts.app')
@section('title', 'Verification')

@section('content')
<main class="position-relative verify full-height">
    <a href="{{ route('home.index') }}" class="position-absolute btn-auth-back"><i class="bi bi-arrow-left-circle"></i></a>
    <div class="d-flex flex-wrap align-items-center justify-content-center flex-column">
        <div class="group wrap-verify">
            @if (session('resent'))
                <div class="alert alert-success py-2" role="alert">
                    <i class="bi bi-check-circle me-2"></i><b>{{ __('Sent!') }}</b> Please check your email address.
                </div>
            @endif

            <div class="text-center">
            {{ __('Please check your email address for a verification link to activate your account, ') }}
            {{ __('or ') }}
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline dotted" onclick="showLoading()">{{ __('click here') }}</button>
            </form>
            {{ __(' to request another.') }}
            </div>
        </div>
    </div>
</main>
@endsection
