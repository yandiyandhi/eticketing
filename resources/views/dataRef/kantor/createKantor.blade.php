@extends('layouts.app')
@section('title', 'Tambah Kantor')
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
                    <h5 class="modal-title">Tambah Kantor</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('kantor.store') }}">
                        @csrf
                        @method('POST') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Nama Kantor</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Alamat Kantor</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    </form>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
