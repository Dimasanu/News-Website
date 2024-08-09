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
            <button class="btn btn-primary float-end" id="addButton" data-bs-toggle="modal" data-bs-target="#userModal">Add Data</button>
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
                                    <button class="btn btn-dark btn-sm me-2 editButton" data-id="{{ $user->id }}" data-first_name="{{ $user->first_name }}" data-last_name="{{ $user->last_name }}" data-email="{{ $user->email }}" data-is_superadmin="{{ $user->is_superadmin }}" data-bs-toggle="modal" data-bs-target="#userModal">
                                        Edit
                                    </button>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
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

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah/Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="dataForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="dataFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="dataFirstName" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="dataLastName" name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="dataEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="dataEmail" name="email" required>
                    </div>
                    <div class="mb-3" id="passwordField">
                        <label for="dataPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="dataPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="dataIsSuperadmin" class="form-label">Superadmin</label>
                        <input type="checkbox" id="dataIsSuperadmin" name="is_superadmin">
                    </div>
                    <input type="hidden" id="dataId" name="id">
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.editButton');
        var addButton = document.getElementById('addButton');
        var dataForm = document.getElementById('dataForm');
        var modalTitle = document.querySelector('.modal-title');
        var passwordField = document.getElementById('dataPassword');
        var csrfToken = document.querySelector('input[name="_token"]').value;
        
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var userId = this.getAttribute('data-id');
                var userFirstName = this.getAttribute('data-first_name');
                var userLastName = this.getAttribute('data-last_name');
                var userEmail = this.getAttribute('data-email');
                var userIsSuperadmin = this.getAttribute('data-is_superadmin') === '1';
                
                modalTitle.textContent = 'Edit Data';
                dataForm.action = `/user/${userId}`;
                dataForm.method = 'POST';
                dataForm.innerHTML = `
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="mb-3">
                        <label for="dataFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="dataFirstName" name="first_name" value="${userFirstName}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="dataLastName" name="last_name" value="${userLastName}">
                    </div>
                    <div class="mb-3">
                        <label for="dataEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="dataEmail" name="email" value="${userEmail}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="dataPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="dataIsSuperadmin" class="form-label">Superadmin</label>
                        <input type="checkbox" id="dataIsSuperadmin" name="is_superadmin" ${userIsSuperadmin ? 'checked' : ''}>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                `;
            });
        });

        addButton.addEventListener('click', function() {
            modalTitle.textContent = 'Tambah Data';
            dataForm.action = `/user`;
            dataForm.method = 'POST';
            dataForm.innerHTML = `
                <input type="hidden" name="_token" value="${csrfToken}">
                <div class="mb-3">
                    <label for="dataFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="dataFirstName" name="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="dataLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="dataLastName" name="last_name">
                </div>
                <div class="mb-3">
                    <label for="dataEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="dataEmail" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="dataPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="dataPassword" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="dataIsSuperadmin" class="form-label">Superadmin</label>
                    <input type="checkbox" id="dataIsSuperadmin" name="is_superadmin">
                </div>
                <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
            `;
        });
    });
</script>

@endsection
