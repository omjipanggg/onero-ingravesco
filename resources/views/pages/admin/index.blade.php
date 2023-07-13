@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row gap-0 row-gap-4">
        <div class="col-lg-4 mt-3 mt-sm-4">
            <div class="card shadow">
                <div class="card-header"><i class="bi bi-speedometer me-2"></i>{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-check-circle me-2"></i><strong>Nicely done!</strong> {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-2">Available tables:</p>

                    <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                    @foreach ($tables as $element)
                        <span class="badge bg-dark">{{ $element }}</span>
                    @endforeach
                    </div>

                </div>
                <div class="card-footer">
                    <i class="bi bi-info-circle me-2"></i>These tables are unique.
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-3 mt-sm-4">
            <div class="card shadow">
                <div class="card-header"><i class="bi bi-people me-2"></i>{{ __('Users') }}</div>
                <div class="card-body">
                    @foreach ($users as $user)
                        <form action="{{ route('user.delete', $user->id) }}" id="delete-form-{{ $user->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered m-0 fetch" id="fetchUser">
                            <thead>
                                <tr>
                                    <th colspan="2">Action</th>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Email</th>
                                    <th rowspan="2">Verified</th>
                                    <th rowspan="2">Roles</th>
                                </tr>
                                <tr>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    @if ($user->id === '00000000-0000-0000-0000-000000000000')
                                    <td><i class="bi bi-pencil-square"></i></td>
                                    <td><i class="bi bi-trash"></i></td>
                                    @else
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" onclick="event.preventDefault();" class="text-color" data-bs-toggle="modal" data-bs-target="#modalControl" data-bs-table="User" data-bs-type="Edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td><a href="#" class="dotted btn-delete" data-id="{{ $user->id }}" data-name="{{ Str::headline($user->name) }}" data-delete-form="delete-form-{{ $user->id }}"><i class="bi bi-trash"></i></a></td>
                                    @endif
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @empty($user->email_verified_at)
                                    <td><span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Unverified</span></td>
                                    @else
                                    <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Verified</span></td>
                                    {{-- <td>{{ date('F d, Y', strtotime($user->email_verified_at)) }}</td> --}}
                                    @endempty
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-dark">
                                                <i class="bi bi-tags me-1"></i>{{ Str::lower($role->name) }}
                                            </span>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Verified</th>
                                    <th>Roles</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <i class="bi bi-info-circle me-2"></i>These records have been filtered.
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.footer')
@endsection
