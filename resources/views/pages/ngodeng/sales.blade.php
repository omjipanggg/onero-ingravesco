@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Sales')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col p-0">
				<div class="card">
					<div class="card-header">
						<a href="#" onclick="event.preventDefault();" data-bs-target="#modalControl" data-bs-route="{{ route('product.create') }}" data-bs-toggle="modal" data-bs-type="Create" data-bs-table="Product" class="btn btn-color"><i class="bi bi-file-earmark-plus me-2"></i>Product</a>
					</div>
					<div class="card-body">
						Data
					</div>
					<div class="card-footer">Footer</div>
				</div>
			</div>
		</div>
	</div>
@endsection