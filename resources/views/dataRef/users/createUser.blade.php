@extends('layouts.app')
@section('title', 'Tambah User')
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
                    <h5 class="modal-title">Tambah User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        @method('POST') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Divisi</label>
                                <select name="divisi_id" id="divisi_id" class="form-control divisiselect2"
                                    id="divisiselect2" required>
                                    <option value="">-- Pilih Divisi --</option>
                                    @foreach ($divisi as $div)
                                        <option value="{{ $div->id }}">
                                            {{ $div->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-control jabatanselect2" required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">
                                            {{ $jabatan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Kantor</label>
                                <select name="kantor_id" class="form-control kantor" required>
                                    <option value="">-- Pilih Kantor --</option>
                                    @foreach ($kantors as $kantor)
                                        <option value="{{ $kantor->id }}">
                                            {{ $kantor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="active" class="form-control status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>

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
        $('.divisiselect2, .jabatanselect2, .kantor, .status').select2();
    </script>

    <script>
        $('#jenis_aset_id').on('change', function() {

            let jenis_id = $(this).val();

            $('#aset_id').html('<option value="">Loading...</option>');

            if (jenis_id) {
                $.ajax({
                    url: '/get-data/' + jenis_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('#aset_id').empty();
                        $('#aset_id').append('<option value="">-- Pilih Kendaraan --</option>');

                        $.each(data, function(key, value) {
                            $('#aset_id').append(
                                `<option value="${value.id}">
                            ${(value.nama_aset ?? value.nama_aset).toLowerCase().replace(/\b\w/g, l => l.toUpperCase())} - ${(value.no_polisi ?? value.no_polisi).toUpperCase()}
                        </option>`
                            );
                        });

                    }
                });
                $('#aset_id').trigger('change');
            } else {
                $('#aset_id').empty();
            }

        });
    </script>
@endpush
