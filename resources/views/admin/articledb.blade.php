@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Articles</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Articles
            <a href="{{ route('articles.index', ['add' => 'true']) }}" class="btn btn-primary float-end">Add Article</a>
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
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->judul }}</td>
                            <td>{{ $article->penulis }}</td>
                            <td>{{ $article->isi }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td><img src="{{ $article->gambar }}" alt="{{ $article->judul }}" width="50"></td>
                            <td>{{ $article->created_at }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('articles.index', ['edit' => $article->id]) }}" class="btn btn-dark btn-sm me-2">Edit</a>
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
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
<div class="modal fade show @if(request('add') == 'true' || request('edit')) d-block @endif" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ request('edit') ? 'Edit Article' : 'Add Article' }}</h5>
                <a href="{{ route('articles.index') }}" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form action="{{ request('edit') ? route('articles.update', request('edit')) : route('articles.store') }}" method="POST">
                    @csrf
                    @if(request('edit'))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="dataTitle" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="dataTitle" name="judul" value="{{ request('edit') ? $articles->where('id', request('edit'))->first()->judul : '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataWriter" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="dataWriter" name="penulis" value="{{ request('edit') ? $articles->where('id', request('edit'))->first()->penulis : '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataFill" class="form-label">Isi</label>
                        <textarea class="form-control" id="dataFill" name="isi" required>{{ request('edit') ? $articles->where('id', request('edit'))->first()->isi : '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dataCategory" class="form-label">Kategori</label>
                        <select class="form-control" id="dataCategory" name="category_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('edit') && $articles->where('id', request('edit'))->first()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dataImage" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="dataImage" name="gambar" value="{{ request('edit') ? $articles->where('id', request('edit'))->first()->gambar : '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ request('edit') ? 'Update' : 'Save' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
