@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid dashboard" id="content-placeholder">
    	<div class="d-flex flex-wrap align-items-strecth justify-content-between gap-3">
			<div class="card col-md-6 flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-cart3 me-2"></i>Sales
				</div>
				<div class="card-body">
					<canvas id="orderChart" class="m-0"></canvas>
					<ul class="square px-3 m-0">
						{{--
						<li><strong>{{ $orderThisWeek }}</strong> successful transactions this week</li>
						<li><strong>{{ $orderLastWeek }}</strong> successful transactions last week</li>
						<li>Made <strong>{{ $orderLastMonth }}</strong> transactions last month</li>
						--}}
					</ul>
				</div>
				<div class="card-footer bg-outline-color">
					<a href="{{ route('ngodeng.sales') }}" class="card-link text-dark dotted">Details</a>
				</div>
			</div>
			<div class="card col-md-4 flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-database me-2"></i>Products
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li>Registered <strong>{{ $products->count() }}</strong> items:
							<ul class="px-3 m-0">
								@forelse($products as $product)
									@php($quantity=0)
									@foreach($product->sales as $sale)
										@if ($product->id == $sale->pivot->product_id)
											@php($quantity = $quantity + $sale->pivot->quantity)
										@endif
									@endforeach
									<li>{{ Str::headline($product->name) }}&mdash;Sold <strong>{{ number_format($quantity, 0, ',', '.') }}</strong> items</li>
								@empty
								<li>No item listed</li>
								@endforelse
							</ul>
						</li>
					</ul>
				</div>
				<div class="card-footer bg-outline-color">
					<a href="{{ route('ngodeng.products') }}" class="card-link text-dark dotted">Details</a>
				</div>
			</div>
			<div class="card flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-people me-2"></i>Users
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li><strong>{{ $users->count() }}</strong> current active users</li>
					</ul>
				</div>
			</div>
			<div class="card flex-fill">
				<div class="card-header bg-color">
					<i class="bi bi-question-circle me-2"></i>FAQ
				</div>
				<div class="card-body">
					<ul class="square px-3 m-0">
						<li><a href="#" onclick="event.preventDefault();">Lorem ipsum sit amet dolor</a></li>
					</ul>
				</div>
			</div>
    	</div>
    </div>
@endsection