<div class="modal fade" id="foto1Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Foto 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="previewFoto1" src="{{ $kendaraan->foto1 ? asset('storage/' . $kendaraan->foto1) : '' }}"
                    class="img-fluid" alt="Foto 1">
            </div>

        </div>
    </div>
</div>
