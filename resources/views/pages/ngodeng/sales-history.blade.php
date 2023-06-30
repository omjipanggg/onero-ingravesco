@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Sales')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card-container">
					@foreach ($products as $product)
					<div class="card pointer item-on-card" data-id="{{ $product->id }}" data-name="{{ Str::headline($product->name) }}" data-price="{{ $product->price }}">
						<img src="{{ asset('storage\\ngodeng\\products\\' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
						<div class="card-body py-1 px-2">
							<div class="card-text fw-bold">
								{{ Str::headline($product->name) }}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-md-12 col-lg-6 mt-4 mt-lg-0">
				<div class="card">
					<div class="card-header text-white bg-color"><i class="bi bi-database me-2"></i>Sales</div>
					<div class="card-body px-3 pt-2 pb-3">
						<div class="table-responsive">
							<table class="table table-sm table-hover table-bordered fetchSales" id="itemList">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Quantity</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody class="cart-placeholder align-middle"></tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Subtotal</th>
										<th class="total-count"></th>
										<th class="total-cart"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<button class="btn btn-color btn-clear-cart" type="button">Clear<i class="bi bi-cart-x ms-2"></i></button>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection