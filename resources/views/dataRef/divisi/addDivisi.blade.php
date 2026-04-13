@extends('layouts.app')
@section('title', 'Tambah Divisi')
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
                    <h5 class="modal-title">Tambah Divisi</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('divisi.store') }}">
                        @csrf
                        @method('POST') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Departemen</label>
                                <select name="department_id" class="form-control" required>
                                    <option value="">-- Pilih Departemen --</option>
                                    @foreach ($dept as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Nama Divisi</label>
                                <input type="text" name="name" class="form-control" value="{{ old('address') }}"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    </form>
                </div>
            </div>
            <!--/ Column Search -->
        </div>
    </div>
    @include('layouts.footercontent')
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
