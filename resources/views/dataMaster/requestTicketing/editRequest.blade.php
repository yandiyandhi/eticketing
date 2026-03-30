{{-- <div class="modal fade" id="modalEditRequest{{ $request->id }}" tabindex="-1" aria-hidden="true">
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
</div> --}}

@extends('layouts.app')
@section('title', 'Request Ticketing')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('partials.alert')
            <!-- Column Search -->
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title">Edit Form Request</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT') <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">Request Name</label>
                                <input type="text" name="request_name" class="form-control"
                                    value="{{ old('request_name', $data->request_name) }}" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Request By</label>
                                <input type="text" name="user_id" value="{{ $data->user_id }}" hidden>
                                <input type="text" class="form-control" value="{{ $data->user->name ?? '' }}" readonly>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Department</label>
                                <select name="department_id" class="form-control" required>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $data->department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Category Task</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $data->category_id == $category->id ? 'selected' : '' }}>
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
                                            {{ $data->kpi_id == $kpi->id ? 'selected' : '' }}>
                                            {{ $kpi->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Kendala/Keterangan</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ old('description', $data->description) }}" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="col gap-2 d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary">Perbarui Data</button>
                                <button type="button" class="btn btn-label-secondary"
                                    data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        @include('dataMaster.requestTicketing.createRequest')

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
