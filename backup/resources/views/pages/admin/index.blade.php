@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row gap-0 row-gap-4">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header"><i class="bi bi-speedometer me-3"></i>{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-check-circle me-2"></i><strong>Nicely done!</strong> {{ session('status') }}
                        </div>
                    @endif
                    <ul class="m-0 px-3">
                        <li>
                            <a href="{{ route('home.ngodengIndex') }}" class="dotted">Ngodeng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header"><i class="bi bi-people me-3"></i>{{ __('Users') }}</div>
                <div class="card-body">
                    List of user will be displayed here.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
