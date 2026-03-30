<div class="modal fade" id="modalEditRequest{{ $request->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Form Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('requests.update', $request->id) }}">
                @csrf
                @method('PUT') <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">Request Name</label>
                        <input type="text" name="request_name" class="form-control" 
                               value="{{ old('request_name', $request->request_name) }}" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Request By</label>
                        <input type="text" name="user_id" value="{{ $request->user_id }}" hidden>
                        <input type="text" class="form-control" value="{{ $request->user->name ?? '' }}" readonly>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Department</label>
                        <input type="text" name="department_id" value="{{ $request->department_id }}" hidden>
                        <input type="text" class="form-control" value="{{ $request->department->name ?? '' }}" readonly>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Category Task</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $request->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->task_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">KPI</label>
                        <select name="kpi_id" class="form-control" required>
                            @foreach ($kpis as $kpi)
                                <option value="{{ $kpi->id }}" 
                                    {{ $request->kpi_id == $kpi->id ? 'selected' : '' }}>
                                    {{ $kpi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Kendala/Keterangan</label>
                        <input type="text" name="description" class="form-control" 
                               value="{{ old('description', $request->description) }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                </div>
            </form>
        </div>
    </div>
</div>