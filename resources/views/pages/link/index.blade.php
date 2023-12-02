@extends('layouts.app')
@section('title', 'Permalink')

@section('content')

    <div id="name"></div>

    @include('components.navbar')

    <div class="container py-5">
    	<div class="row">
    		<div class="col">
    			<div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                            <p class="m-0">Permalink</p>
                            <div class="btn-group" role="group" aria-label="Insert buttons">
                                <a href="{{ route('link.create') }}" class="btn btn-sm btn-color">New</a>
                                <a href="{{ route('link.create') }}" class="btn btn-sm btn-color"><i class="bi bi-plus"></i></a>
                            </div>
                        </div>
                    </div>
    				<div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-{{ session('variant') ?? 'success' }} rounded-0" role="alert">
                                @if (session('variant') != 'danger')
                                    <i class="bi bi-check-circle me-1"></i>
                                @else
                                    <i class="bi bi-x-circle me-1"></i>
                                @endif
                                {{ session('status') }}
                            </div>
                        @endif

    					<div class="table-responsive">
    						<table class="table table-bordered table-hover link table-sm responsive">
    							<thead>
    								<tr>
    									<th>Permalink</th>
    									<th>Name</th>
    									<th>Description</th>
    								</tr>
    							</thead>
    							<tbody>
                                    @foreach ($links as $link)
    								<tr>
    									<td>
                                            <div class="btn-group" role="group" aria-label="Download buttons">
    										<a href="{{ $link->path }}" target="_blank" class="btn btn-sm btn-color">
                                                Download
                                            </a>
                                            <button class="btn btn-sm btn-color">
                                                <i class="bi bi-download"></i>
                                            </button>
                                            </div>
    									</td>
    									<td>{{ $link->name }}</td>
    									<td>{{ $link->description }}</td>
    								</tr>
                                    @endforeach
    							</tbody>
                                <tfoot>
                                    <tr>
                                        <th>Permalink</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </tfoot>
    						</table>
    					</div>
    				</div>
                    <div class="card-footer">
                        <i class="bi bi-info-circle me-1"></i>
                        If the link does not work, please contact (<a href="mailto:omjipanggg@gmail.com" class="fw-bold">administrator@astaga.web.id</a>), thank you.
                    </div>
    			</div>
    		</div>
    	</div>
    </div>

    @include('components.footer')
@endsection
