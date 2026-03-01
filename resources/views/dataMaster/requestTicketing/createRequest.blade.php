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
                        <input type="text" name="user_id" value="{{ Auth::user()->id ?? ' ' }}" class="form-control"
                            hidden>
                        <input type="text" name="request_by" value="{{ Auth::user()->name ?? ' ' }}"
                            class="form-control" required readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Department</label>
                        <input type="text" name="department_id" value="{{ $user->department_id ?? ' ' }}"
                            class="form-control" hidden>
                        <input type="text" name="" value="{{ $user->department->name ?? ' ' }}"
                            class="form-control" readonly required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Category Task</label>
                        <select name="category_id" class="form-control" required>
                            <option value="" disabled selected> -- Pilih Kategori -- </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->task_name ? 'selected' : '' }}>
                                    {{ $category->task_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">KPI</label>
                        <select name="kpi_id" class="form-control" required>
                            <option value="" disabled selected> -- Pilih KPI -- </option>
                            @foreach ($kpis as $kpi)
                                <option value="{{ $kpi->id }}" {{ old('kpi_id') == $kpi->name ? 'selected' : '' }}>
                                    {{ $kpi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Kendala/Keterangan</label>
                        <input type="text" name="description" class="form-control" required>
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
