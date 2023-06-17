@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.navbar')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="bi bi-speedometer me-2"></i>{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Selamat datang di sini, kembali.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
