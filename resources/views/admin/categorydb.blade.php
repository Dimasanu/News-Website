@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Categories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Categories
            <a href="{{ route('categories.index', ['add' => 'true']) }}" class="btn btn-primary float-end">Add Category</a>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('categories.index', ['edit' => $category->id]) }}" class="btn btn-dark btn-sm me-2">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
<div class="modal fade show @if(request('add') == 'true' || isset($editCategory)) d-block @endif" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ isset($editCategory) ? 'Edit Category' : 'Add Category' }}</h5>
                <a href="{{ route('categories.index') }}" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form action="{{ isset($editCategory) ? route('categories.update', $editCategory->id) : route('categories.store') }}" method="POST">
                    @csrf
                    @if(isset($editCategory))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="dataName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="dataName" name="name" value="{{ isset($editCategory) ? $editCategory->name : '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($editCategory) ? 'Update' : 'Save' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
