@extends('layouts.app')
@section('title', 'Settings')

@section('content')
    @include('components.navbar')
    <div class="container my-5">
    	<div class="row">
    		<div class="col">
    			<div class="card shadow">
    				<div class="card-header">
    					<i class="bi bi-sliders me-2"></i>Settings
    				</div>
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table table-sm table-hover table-bordered m-0">
    							<tr>
    								<th>ID</th>
    								<td>{{ Str::of(Str::mask(Str::upper(auth()->user()->id), '*', 4, -4))->replace('*********', '*') }}</td>
    							</tr>
								<tr>
									<th>Name</th>
                                    <td>{{ Str::headline(auth()->user()->name) }}</td>
								</tr>
								<tr>
									<th>Email address</th>
									<td><strong>{{ Str::lower(auth()->user()->email) }}</strong></td>
								</tr>
								<tr>
									<th>Last login information</th>
                                    <td>{{ date('F d, Y H:i:s', strtotime($log->created_at)) }}</td>
								</tr>
    						</table>
    					</div>
    				</div>
    				<div class="card-footer">
    					<i class="bi bi-info-circle me-2"></i>This response is auto-generated, and fetched specifically for you.
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    @include('components.footer')
@endsection
