@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Article</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Article</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Article
            <button class="btn btn-primary float-end" id="addButton" data-bs-toggle="modal" data-bs-target="#Modal">Add Data</button>
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
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Isi</th>
                        <th>Jenis Kategori</th>
                        <th>Gambar</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articledb as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->judul }}</td>
                            <td>{{ $article->penulis }}</td>
                            <td>{{ $article->isi }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->gambar }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-dark btn-sm me-2 editButton" data-id="{{ $article->id }}" data-title="{{ $article->judul }}" data-writer="{{ $article->penulis }}" data-fill="{{ $article->isi }}" data-category_id="{{ $article->category_id }}" data-image="{{ $article->gambar }}" data-bs-toggle="modal" data-bs-target="#Modal">
                                        Edit
                                    </button>
                                    <form action="{{ route('articledb.destroy', $article->id) }}" method="POST" style="display:inline;">
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

<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
                        <label for="dataTitle" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="dataTitle" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataWriter" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="dataWriter" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataFill" class="form-label">Isi</label>
                        <textarea class="form-control" id="dataFill" name="isi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dataCategory" class="form-label">Kategori</label>
                        <select class="form-control" id="dataCategory" name="category_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dataImage" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="dataImage" name="gambar" required>
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
        var dataMethod = document.getElementById('dataMethod');
        var modalTitle = document.querySelector('.modal-title');
        var csrfToken = document.querySelector('input[name="_token"]').value;

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var articleId = this.getAttribute('data-id');
                var articleTitle = this.getAttribute('data-title');
                var articleWriter = this.getAttribute('data-writer');
                var articleFill = this.getAttribute('data-fill');
                var articleCategoryId = this.getAttribute('data-category_id');
                var articleImage = this.getAttribute('data-image');

                modalTitle.textContent = 'Edit Data';
                dataForm.action = `/articledb/${articleId}`;
                dataMethod.value = 'PUT';
                document.getElementById('dataTitle').value = articleTitle;
                document.getElementById('dataWriter').value = articleWriter;
                document.getElementById('dataFill').value = articleFill;
                document.getElementById('dataCategory').value = articleCategoryId;
                document.getElementById('dataImage').value = articleImage;
                document.getElementById('dataId').value = articleId;
            });
        });

        addButton.addEventListener('click', function() {
            modalTitle.textContent = 'Tambah Data';
            dataForm.action = `/articledb`;
            dataMethod.value = 'POST';
            document.getElementById('dataTitle').value = '';
            document.getElementById('dataWriter').value = '';
            document.getElementById('dataFill').value = '';
            document.getElementById('dataCategory').value = '';
            document.getElementById('dataImage').value = '';
            document.getElementById('dataId').value = '';
        });
    });
</script>
@endsection

