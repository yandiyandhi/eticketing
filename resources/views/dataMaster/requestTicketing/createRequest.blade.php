<div class="modal fade" id="modalAddRequest" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Form Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">Request Name</label>
                        <input type="text" name="request_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Request By</label>
                        <input type="text" name="request_by" value="{{ $user->name }}" class="form-control"
                            required readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Department</label>
                        <input type="text" name="department_id" value="{{ $user->department->id }}"
                            class="form-control" hidden>
                        <input type="text" name="" value="{{ $user->department->name }}" class="form-control"
                            readonly required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Category Task</label>
                        <input type="text" name="category_task" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">KPI</label>
                        <input type="text" name="kpi" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Kendala/Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
