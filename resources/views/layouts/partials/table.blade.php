<div class="container-fluid px-4">
    <h1 class="mt-4">Account</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Account</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Account
            <button class="btn btn-primary float-end" id="addButton" data-bs-toggle="modal" data-bs-target="#Modal">Add Data</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
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