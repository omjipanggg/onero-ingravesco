@extends('layouts.app')
@section('title', 'Permalink—Create')

@section('content')
    @include('components.navbar')

    <div class="container py-5">
    	<div class="row">
    		<div class="col">
    			<div class="card">
                    <div class="card-header">
                        Links
                    </div>

    				<div class="card-body">
                        <form action="{{ route('link.store') }}" method="POST">
                            @method('POST')
                            @csrf

                            <div class="d-flex flex-column gap-3 mb-2">

                                <div class="form-group">
                                    @error('name')
                                        <span class="invalid-feedback d-inline-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="text" id="name" autocomplete="off" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    @error('path')
                                        <span class="invalid-feedback d-inline-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="text" id="path" autocomplete="off" name="path" placeholder="Path" class="form-control @error('path') is-invalid @enderror">
                                </div>
                                <input type="text" id="description" autocomplete="off" name="description" placeholder="Description" class="form-control">
                                <input type="hidden" id="active" value="{{ true }}" name="active" placeholder="Active" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-color btn-sm px-3 py-2 btn-shadow d-none" id="submit">
                                {{ __('Save') }}
                                <i class="bi bi-cloud-arrow-up ms-2"></i>
                            </button>
                        </form>

    				</div>

                    <div class="card-footer">
                        <div class="btn-group" role="group" aria-label="Save buttons">
                            <button type="button" onclick="triggerClick(event, '#submit');" class="btn btn-color btn-sm">
                                {{ __('Save') }}
                            </button>
                            <button class="btn btn-sm btn-color" onclick="triggerClick(event, '#submit');">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </button>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>

    @include('components.footer')
@endsection
