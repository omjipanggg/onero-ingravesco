@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Sales')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				@if ($products->count() > 0)
				<div class="card-container">
					@foreach ($products as $product)
					<div class="card pointer item-on-card" data-id="{{ $product->id }}" data-name="{{ Str::headline($product->name) }}" data-price="{{ $product->price }}">
						<div class="card-body p-0">
							<img src="{{ asset('storage\\ngodeng\\products\\' . $product->image) }}" alt="{{ $product->name }}" class="card-img">
						</div>
						{{--
						<div class="card-body py-1 px-2">
							<div class="card-text fw-bold">
								{{ Str::headline($product->name) }}
							</div>
						</div>
						--}}
					</div>
					@endforeach
				</div>
				@else
				<div class="card">
					<div class="card-header bg-color">
						<i class="bi bi-database me-3"></i>Products
					</div>
					<div class="card-body">
						<div class="text-center m-3 p-3">
							<p class="fs-15"><i class="bi bi-question-octagon"></i></p>
							No products are currently available, <a href="#" onclick="event.preventDefault();" data-bs-target="#modalControl" data-bs-route="{{ route('product.create') }}" data-bs-toggle="modal" data-bs-type="Create" data-bs-table="Product" class="dotted">click here</a> to insert a new product into database and start using this application, peace be upon you.
						</div>
					</div>
					<div class="card-footer bg-outline-color">
						Footer.
					</div>
				</div>
				@endif
			</div>
			<div class="col-md-12 col-lg-6 mt-4 mt-lg-0">
				<div class="card">
					<div class="card-header bg-color"><i class="bi bi-database me-3"></i>Sales</div>
					<div class="card-body px-3 py-2">
						<div class="table-responsive">
							<table class="table table-sm table-hover table-bordered fetchSales" id="itemList">
								<thead>
									<tr>
										<th>Action</th>
										<th>Name</th>
										<th>Quantity</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody class="cart-placeholder align-middle"></tbody>
								<tfoot>
									<tr>
										<th>Action</th>
										<th>Subtotal</th>
										<th class="total-count">0</th>
										<th class="total-cart">0</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="card-footer bg-outline-color">
						<div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
							<div class="group">
								<button class="btn btn-outline-color btn-clear-cart" type="button">Clear<i class="bi bi-cart-x ms-2"></i></button>
								<a href="#" id="saveToLocal" class="btn btn-outline-color">Save<i class="bi bi-save ms-2"></i></a>
							</div>
							<form action="{{ route('ngodeng.store') }}" method="POST" id="checkFormOut">
								@csrf
								<input type="hidden" name="orders" id="toBeCheckedOut" class="form-control" data-user="{{ Auth::user() }}">
								<input type="hidden" name="items" id="itemsInCart" class="form-control">
								<button type="submit" id="saveDbTrigger" class="btn btn-color d-none">Checkout<i class="bi bi-cart-check ms-2"></i></button>
							</form>
							<button type="button" id="saveToDatabase" class="btn btn-color">Checkout<i class="bi bi-cart-check ms-2"></i></button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection