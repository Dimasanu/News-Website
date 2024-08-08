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
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-dark btn-sm me-2" data-bs-toggle="modal" data-bs-target="#Modal">
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
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
                <form id="dataForm">
                    <div class="mb-3">
                        <label for="dataTitle" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="dataTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataWriter" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="dataWriter" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataFill" class="form-label">Isi</label>
                        <input type="text" class="form-control" id="dataFill" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataCategory" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="dataCategory" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataImage" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="dataImage" required>
                    </div>
                    <input type="hidden" id="dataId">
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection