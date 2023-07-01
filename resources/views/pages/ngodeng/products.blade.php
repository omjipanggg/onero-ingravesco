@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Products')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<a href="#" onclick="event.preventDefault();" data-bs-target="#modalControl" data-bs-route="{{ route('product.create') }}" data-bs-toggle="modal" data-bs-type="Create" data-bs-table="Product" class="btn btn-color">Add New Product<i class="bi bi-box-arrow-up-right ms-2"></i></a>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive m-0 p-3">
							<table class="table table-sm table-bordered border-hover m-0 fetch">
								<thead>
									<tr>
										<th colspan="2">Action</th>
										<th rowspan="2">Name</th>
										<th rowspan="2">Price</th>
										<th rowspan="2">Image</th>
										<th rowspan="2">Description</th>
										<th rowspan="2">Tags</th>
										<th rowspan="2">Status</th>
									</tr>
									<tr>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($products as $element)
									<tr>
										<td><a href="#" onclick="event.preventDefault();" data-bs-target="#modalControl" data-bs-route="{{ route('product.edit', $element->id) }}" data-bs-toggle="modal" data-bs-type="Edit" data-bs-table="Product" class="dotted"><i class="bi bi-pencil-square"></i></a></td>
										<td><a href="{{ route('product.delete', $element->id) }}" class="dotted btn-delete" data-name="{{ Str::headline($element->name) }}"><i class="bi bi-trash"></i></a></td>
										<td>{{ Str::headline($element->name) }}</td>
										<td data-hidden-data="{{ $element->price }}">@money($element->price)</td>
										<td>
											@if ($element->image === 'default.png')
											-
											@else
											<a href="#" data-route="{{ route('home.previewImage', ['ngodeng\\products', $element->image]) }}" class="dotted img-preview">{{ $element->image }}</a>
											@endif
										</td>
										<td>{{ $element->description ?? '-' }}</td>
										<td class="w-20">
											@foreach ($element->categories as $cat)
												<span class="badge text-bg-secondary"><i class="bi bi-tag me-1"></i>{{ $cat->name }}</span>
											@endforeach
										</td>
										@if ($element->active)
										<td><span class="badge text-bg-success"><i class="bi bi-check-circle me-1"></i>active</span></td>
										@else
										<td><span class="badge text-bg-danger"><i class="bi bi-x-circle me-1"></i>inactive</span></td>
										@endif
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>Edit</th>
										<th>Delete</th>
										<th>Name</th>
										<th>Price</th>
										<th>Image</th>
										<th>Description</th>
										<th>Tags</th>
										<th>Status</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<p class="m-0">
							<i class="bi bi-info-circle me-2"></i>These records are shown after being filtered to be suitable with "NGODENG" application.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection