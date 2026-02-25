<div class="modal fade" id="modalEditStatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formEditStatus" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-2">
                        <label class="form-label">Status Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
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
