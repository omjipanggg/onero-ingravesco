@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row gap-0 row-gap-4">
        <div class="col-lg-6 mt-4">
            <div class="card shadow">
                <div class="card-header"><i class="bi bi-speedometer me-3"></i>{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-check-circle me-2"></i><strong>Nicely done!</strong> {{ session('status') }}
                        </div>
                    @endif
                    Welcome to Jumanji!
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="card shadow">
                <div class="card-header"><i class="bi bi-people me-3"></i>{{ __('Users') }}</div>
                <div class="card-body">
                    @foreach ($users as $user)
                        <form action="{{ route('user.delete', $user->id) }}" id="delete-form-{{ $user->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered m-0" id="fetchUser">
                            <thead>
                                <tr>
                                    <th colspan="2">Action</th>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Email</th>
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
                                    {{-- @if ($user->id === '00000000-0000-0000-0000-000000000000') --}}
                                    {{-- <td><i class="bi bi-pencil-square"></i></td> --}}
                                    {{-- <td><i class="bi bi-trash"></i></td> --}}
                                    {{-- @else --}}
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" onclick="event.preventDefault();" class="text-color" data-bs-toggle="modal" data-bs-target="#modalControl" data-bs-table="User" data-bs-type="Edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td><a href="#" class="dotted btn-delete" data-id="{{ $user->id }}" data-name="{{ Str::headline($user->name) }}" data-delete-form="delete-form-{{ $user->id }}"><i class="bi bi-trash"></i></a></td>
                                    {{-- @endif --}}
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
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
                                    <th>Roles</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
