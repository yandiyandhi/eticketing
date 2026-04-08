<div class="modal fade" id="modalAddCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="mb-2">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="task_name" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    @can('kategori.create')
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    @else
                        <button type="submit" class="btn btn-secondary" @disabled(true)>Simpan</button>
                    @endcan
                </div>
            </form>

        </div>
    </div>
</div>
