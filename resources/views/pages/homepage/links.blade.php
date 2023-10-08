@extends('layouts.app')
@section('title', 'Home')

@section('content')
    @include('components.navbar')

    <div class="container py-5">
    	<div class="row">
    		<div class="col">
    			<div class="card">
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table table-bordered table-hover fetch table-sm">
    							<thead>
    								<tr>
    									<th>No</th>
    									<th>Name</th>
    									<th>Permalink</th>
    									<th>Description</th>
    								</tr>
    							</thead>
    							<tbody>
									@php($i=1)
    								<tr>
    									<td>{{ $i++ }}</td>
    									<td>OINST</td>
    									<td>
    										<a href="https://www.mediafire.com/file/bevkr03chlojonq/ONSL2021.rar/file" target="_blank" class="dotted">Buka</a>
    									</td>
    									<td>www.yasir252.com</td>
    								</tr>
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>SPSS-25</td>
                                        <td>
                                            <a href="https://www.mediafire.com/file/2jo331gvrq4zoj9/spstat25_instll64bit.rar/file" target="_blank" class="dotted">Buka</a>
                                        </td>
                                        <td>www.alex71.com</td>
                                    </tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    @include('components.footer')
@endsection
