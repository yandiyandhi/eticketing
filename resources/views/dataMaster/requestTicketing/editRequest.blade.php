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
                                <label class="form-label">Request By</label>
                                <input type="text" name="user_id" value="{{ $data->user_id }}" hidden>
                                <input type="text" class="form-control" value="{{ $data->user->name ?? '' }}" readonly>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Department</label>
                                <input type="text" name="department_id" value="{{ $data->department_id }}" hidden>
                                <input type="text" class="form-control" value="{{ $data->department->name ?? '' }}"
                                    readonly>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Request To</label>
                                <select name="request_to" class="form-control" required>
                                    <option value="it" {{ $data->request_to == 'it' ? 'selected' : '' }}>IT</option>
                                    <option value="hr" {{ $data->request_to == 'hr' ? 'selected' : '' }}>HR/GA</option>
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
                                <label class="form-label">Kendala/Keterangan</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ old('description', $data->description) }}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Perbarui
                            Data</button>
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
