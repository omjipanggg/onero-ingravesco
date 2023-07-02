@extends('layouts.app-ngodeng-dashboard')
@section('title', 'Sales')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col mt-4 mt-lg-0">
				<div class="card">
					<div class="card-header bg-color"><i class="bi bi-database me-2"></i>Sales</div>
					<div class="card-body p-0">
						<div class="table-responsive m-0 p-3">
							<table class="table table-sm table-hover table-bordered m-0 table-order-ngodeng" data-target="{{ route('ajax.tableOrder', 3) }}">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Sales</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody class="align-middle"></tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Sales</th>
										<th>Total</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="card-footer bg-outline-color">
						<i class="bi bi-info-circle me-2"></i>These records are shown after being filtered.
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection