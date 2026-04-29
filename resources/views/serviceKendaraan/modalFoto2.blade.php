<div class="modal fade" id="foto2Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Foto 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="previewFoto2" src="{{ $kendaraan->foto2 ? asset('storage/' . $kendaraan->foto2) : '' }}"
                    class="img-fluid" alt="Foto 1">
            </div>

        </div>
    </div>
</div>
