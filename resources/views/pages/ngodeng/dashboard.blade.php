@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid dashboard mt-4" id="content-placeholder">
    	<div class="d-flex flex-wrap align-items-strecth justify-content-between gap-3">
			<div class="card flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-database me-2"></i>Products
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li>Registered <strong>{{ $products->count() }}</strong> items</li>
					</ul>
				</div>
				<div class="card-footer bg-outline-color">
					<a href="{{ route('ngodeng.products') }}" class="card-link text-dark">Explore</a>
				</div>
			</div>
			<div class="card flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-cart3 me-2"></i>Sales
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li><strong>0</strong> transactions last week</li>
						<li>Made <strong>0</strong> transactions last month</li>
					</ul>
				</div>
				<div class="card-footer bg-outline-color">
					<a href="{{ route('ngodeng.sales') }}" class="card-link text-dark">Explore</a>
				</div>
			</div>
			<div class="card flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-people me-2"></i>Users
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li>Registered <strong>{{ $users->count() }}</strong> users</li>
					</ul>
				</div>
			</div>
			<div class="card flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-question-circle me-2"></i>FAQ
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li>TBD</li>
					</ul>
				</div>
			</div>
    	</div>
    </div>
@endsection