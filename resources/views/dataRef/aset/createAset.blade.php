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
                    <form method="POST" action="{{ route('aset.store') }}">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label">Nama Aset</label>
                                        <input type="text" name="nama_aset" class="form-control"
                                            value="{{ old('name') }}" required>
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Jenis Aset</label>
                                        <select name="jenis_aset_id" class="form-control jenisasetselect2"
                                            style="font-size: 6pt;" required>
                                            <option value="">-- Pilih Jenis Aset --</option>
                                            @foreach ($jenisaset as $jenis)
                                                <option value="{{ $jenis->id }}" {{ old('jenis_aset_id') }}>
                                                    {{ ucwords($jenis->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Merk</label>
                                        <input type="text" name="merk" class="form-control"
                                            value="{{ old('merk') }}">
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Model</label>
                                        <input type="text" name="model" class="form-control"
                                            value="{{ old('merk') }}">
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">User</label>
                                        <select name="user_id" class="form-control userselect2">
                                            <option value="">-- Pilih User --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user_id') }}>
                                                    {{ ucwords($user->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Kondisi Aset</label>
                                        <select name="kondisi_id" class="form-control asetselect2" required>
                                            <option value="">-- Pilih Kondisi --</option>
                                            @foreach ($kondisi as $aset)
                                                <option value="{{ $aset->id }}" {{ old('kondisi_id') }}>
                                                    {{ ucwords($aset->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Divisi</label>
                                        <select name="divisi_id" class="form-control divisiselect2" required>
                                            <option value="">-- Pilih Divisi --</option>
                                            @foreach ($divisi as $div)
                                                <option value="{{ $div->id }}" {{ old('divisi_id') }}>
                                                    {{ ucwords($div->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label">Kantor</label>
                                        <select name="kantor_id" class="form-control kantorselect2" required>
                                            <option value="">-- Pilih Kantor --</option>
                                            @foreach ($kantors as $kantor)
                                                <option value="{{ $kantor->id }}" {{ old('kantor_id') }}>
                                                    {{ ucwords($kantor->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label class="form-label">Departemen</label>
                                        <select name="departemen_id" class="form-control select2" required>
                                            <option value="">-- Pilih Departemen --</option>
                                            @foreach ($departemen as $dept)
                                                <option value="{{ $dept->id }}" {{ old('departemen_id') }}>
                                                    {{ ucwords($dept->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Serial Number</label>
                                        <input type="text" name="serial_number" class="form-control"
                                            value="{{ old('serial_number') }}">
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Spesifikasi</label>
                                        <input type="text" name="spesifikasi" class="form-control"
                                            value="{{ old('spesifikasi') }}">
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">No Polisi</label>
                                        <input type="text" name="no_polisi" class="form-control"
                                            value="{{ old('no_polisi') }}">
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Pajak STNK</label>
                                        <input type="date" name="pajak_stnk" class="form-control"
                                            value="{{ old('pajak_stnk') }}">
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Pajak BPKB</label>
                                        <input type="date" name="pajak_bpkb" class="form-control"
                                            value="{{ old('pajak_bpkb') }}">
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">KIR</label>
                                        <input type="date" name="kir" class="form-control"
                                            value="{{ old('kir') }}">
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
    <script>
        $('.select2, .jenisasetselect2, .userselect2, .asetselect2, .kantorselect2, .divisiselect2').select2();
    </script>
@endpush
