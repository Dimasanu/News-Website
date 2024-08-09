@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Category
            <button class="btn btn-primary float-end" id="addButton" data-bs-toggle="modal" data-bs-target="#categoryModal">Add Data</button>
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
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorydb as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-dark btn-sm me-2 editButton" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                        Edit
                                    </button>
                                    <form action="{{ route('categorydb.destroy', $category->id) }}" method="POST" style="display:inline;">
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

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
                        <label for="dataName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="dataName" name="name" required>
                    </div>
                    <input type="hidden" id="dataId" name="id">
                    <input type="hidden" name="_method" id="dataMethod" value="POST">
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
        var csrfToken = document.querySelector('input[name="_token"]').value;

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var categoryId = this.getAttribute('data-id');
                var categoryName = this.getAttribute('data-name');

                modalTitle.textContent = 'Edit Data';
                dataForm.action = `/categorydb/${categoryId}`;
                dataForm.method = 'POST';
                dataForm.innerHTML = `
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="mb-3">
                        <label for="dataName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="dataName" name="name" value="${categoryName}" required>
                    </div>
                    <input type="hidden" id="dataId" name="id" value="${categoryId}">
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                `;
            });
        });

        addButton.addEventListener('click', function() {
            modalTitle.textContent = 'Tambah Data';
            dataForm.action = `/categorydb`;
            dataForm.method = 'POST';
            dataForm.innerHTML = `
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="_method" value="POST">
                <div class="mb-3">
                    <label for="dataName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="dataName" name="name" required>
                </div>
                <input type="hidden" id="dataId" name="id">
                <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
            `;
        });
    });
</script>
@endsection

