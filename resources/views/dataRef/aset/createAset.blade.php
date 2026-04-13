@extends('layouts.app')
@section('title', 'Tambah Aset')
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
                    <h5 class="modal-title">Tambah Aset</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        @method('POST') <div class="modal-body">

                            <div class="row g-4">

                                <div class="col-lg-6">

                                    <div>
                                        <label class="form-label">Nama Aset</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" required>
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Merk</label>
                                        <input type="text" name="merk" class="form-control"
                                            value="{{ old('merk') }}" required>
                                    </div>

                                </div>
                                <div class="col-lg-6">

                                    <div>
                                        <label class="form-label">Departemen</label>
                                        <select name="kondisi_id" class="form-control" required>
                                            <option value="">-- Pilih Kondisi --</option>
                                            @foreach ($kondisi as $konds)
                                                <option value="{{ $konds->id }}">
                                                    {{ ucwords($konds->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Merk</label>
                                        <input type="text" name="merk" class="form-control"
                                            value="{{ old('merk') }}" required>
                                    </div>

                                </div>
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
