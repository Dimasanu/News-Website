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
                        <label for="dataName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="dataName" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataPosition" class="form-label">Position</label>
                        <input type="text" class="form-control" id="dataPosition" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataOffice" class="form-label">Office</label>
                        <input type="text" class="form-control" id="dataOffice" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="dataAge" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="dataStartDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataSalary" class="form-label">Salary</label>
                        <input type="text" class="form-control" id="dataSalary" required>
                    </div>
                    <input type="hidden" id="dataId">
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </form>
            </div>
        </div>
    </div>
  </div>