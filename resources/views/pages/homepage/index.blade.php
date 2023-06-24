@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.navbar')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        {{ __('Dashboard') }}
                        <i class="bi bi-speedometer"></i>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4><strong>Welcome back, {{ Auth::user()->name }}!</strong></h4>
                    <p class="mb-0">Please select one of the available routes:</p>
                    <ul class="m-0 px-3">
                        <li>Ngodeng (<a href="{{ route('home.ngodengIndex') }}" class="dotted">{{ route('home.ngodengIndex') }}</a>)</li>
                    </ul>
                </div>

                <div class="card-footer">
                    <div id="clock">{{ date('d F Y H:i:s') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
