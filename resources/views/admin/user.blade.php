@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">User</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data User
            <a href="{{ route('users.index', ['add' => 'true']) }}" class="btn btn-primary float-end">Add Data</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Superadmin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_superadmin ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('users.index', ['edit' => $user->id]) }}" class="btn btn-dark btn-sm me-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Form -->
@if(request('add') == 'true' || request('edit'))
<div class="modal fade show d-block" id="userModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ request('edit') ? 'Edit User' : 'Add User' }}</h5>
                <a href="{{ route('users.index') }}" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form action="{{ request('edit') ? route('users.update', request('edit')) : route('users.store') }}" method="POST">
                    @csrf
                    @if(request('edit'))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="dataFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="dataFirstName" name="first_name" value="{{ request('edit') ? $editUser->first_name : '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="dataLastName" name="last_name" value="{{ request('edit') ? $editUser->last_name : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="dataEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="dataEmail" name="email" value="{{ request('edit') ? $editUser->email : '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="dataPassword" name="password" {{ request('add') == 'true' ? 'required' : '' }}>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ request('edit') ? 'Update' : 'Save' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
