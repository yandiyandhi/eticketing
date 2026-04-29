@extends('layouts.app')
@section('title', 'Edit Service Kendaraan')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('partials.alert')
            <div class="card p-0 mb-6">
                <div class="card-header">
                    <h6 class="modal-title mb-0">Edit Service Kendaraan</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('service.update', ['id' => $kendaraan->uuid]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <label class="form-label">Jenis Kendaraan</label>
                                <select id="jenis_aset_id" name="jenis_aset_id" class="form-control jenisasetselect2"
                                    required>
                                    <option value="">-- Pilih Jenis Kendaraan --</option>
                                    @foreach ($jenisaset as $jenis)
                                        <option value="{{ $jenis->id }}" @selected($jenis->id == $kendaraan->aset->jenis_aset->id)>
                                            {{ ucwords($jenis->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Kilometer Awal</label>
                                <input type="text" name="kilometer_awal" id="kilometer_awal"
                                    class="form-control kilometer_awal"
                                    value="{{ number_format($kendaraan->kilometer_awal, 0, ',', '.') ?? '0' }}">
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Nama Kendaraan</label>
                                <select id="aset_id" name="aset_id" class="form-control asetidselect2" required>
                                    @foreach ($aset as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $kendaraan->aset_id)>
                                            {{ ucwords($item->nama_aset) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-lg-4">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi_service" class="form-control"
                                    value="{{ $kendaraan->deskripsi_service ?? '' }}">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Foto 1</label>
                                <div class="flex-row gap-2 d-flex align-items-start">
                                    <input type="file" name="foto1" id="foto1" class="form-control"
                                        value="{{ old('foto1') }}">
                                    <div class="d-flex flex-column gap-2 ms-2">
                                        <a href="javascript" class="btn-icon btn-primary rounded" data-bs-toggle="modal"
                                            data-bs-target="#foto1Modal">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Foto 2</label>
                                <div class="flex-row gap-2 d-flex align-items-start">
                                    <input type="file" name="foto2" id="foto2" class="form-control"
                                        value="{{ old('foto2') }}">
                                    <div class="d-flex flex-column gap-2 ms-2">
                                        <a href="javascript" class="btn-icon btn-primary rounded" data-bs-toggle="modal"
                                            data-bs-target="#foto2Modal">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-lg-4">
                                <label class="form-label">Alasan</label>
                                <input type="text" name="alasan_service" class="form-control"
                                    value="{{ $kendaraan->alasan_service ?? '' }}">
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">Item Service</h6>

                        <div class="form-repeater">
                            <div data-repeater-list="items">

                                @forelse ($kendaraan->items as $item)
                                    <div data-repeater-item>
                                        <div class="row align-items-end">

                                            <div class="col-lg-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" name="nama_item" class="form-control"
                                                    value="{{ $item->nama_item }}">
                                            </div>

                                            <div class="col-lg-3">
                                                <label class="form-label">Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control"
                                                    value="{{ $item->keterangan }}">
                                            </div>

                                            <div class="col-lg">
                                                <label class="form-label">Qty</label>
                                                <input type="number" name="qty" class="form-control qty"
                                                    value="{{ $item->qty }}">
                                            </div>

                                            <div class="col-lg">
                                                <label class="form-label">Harga</label>
                                                <input type="text" name="harga" class="form-control harga"
                                                    value="{{ number_format($item->harga, 0, ',', '.') }}">
                                            </div>

                                            <div class="col-lg">
                                                <label class="form-label">Subtotal</label>
                                                <input type="text" name="subtotal" class="form-control subtotal"
                                                    value="{{ number_format($item->subtotal, 0, ',', '.') }}" readonly>
                                            </div>

                                            <div class="col-lg">
                                                <button type="button" class="btn btn-danger w-100 mt-4"
                                                    data-repeater-delete>
                                                    Hapus
                                                </button>
                                            </div>

                                        </div>
                                        <hr>
                                    </div>
                                @empty
                                    <div data-repeater-item>
                                        <div class="row align-items-end">

                                            <div class="col-lg-3">
                                                <input type="text" name="nama_item" class="form-control">
                                            </div>

                                            <div class="col-lg-3">
                                                <input type="text" name="keterangan" class="form-control">
                                            </div>

                                            <div class="col-lg">
                                                <input type="number" name="qty" class="form-control qty"
                                                    value="1">
                                            </div>

                                            <div class="col-lg">
                                                <input type="text" name="harga" class="form-control harga"
                                                    value="0">
                                            </div>

                                            <div class="col-lg">
                                                <input type="text" name="subtotal" class="form-control subtotal"
                                                    value="0" readonly>
                                            </div>

                                            <div class="col-lg">
                                                <button type="button" class="btn btn-danger w-100 mt-4"
                                                    data-repeater-delete>
                                                    Hapus
                                                </button>
                                            </div>

                                        </div>
                                        <hr>
                                    </div>
                                @endforelse

                            </div>

                            <button type="button" class="btn btn-outline-primary" data-repeater-create>
                                + Tambah Item
                            </button>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footercontent')

        @include('serviceKendaraan.modalFoto1')
        @include('serviceKendaraan.modalFoto2')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
    <script>
        $('.asetidselect2, .jenisasetselect2').select2();
    </script>

    <script>
        $(document).ready(function() {
            function formatRupiah(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            function bersihkan(angka) {
                return angka.replace(/[^0-9]/g, "");
            }

            // format harga saat diketik (SEMUA ROW)
            $(document).on('input', '.harga, .kilometer_awal', function() {
                let angka = bersihkan($(this).val());
                let formatted = formatRupiah(angka);

                $(this).val(formatted);
            });

            // hitung subtotal per baris
            $(document).on('input', '.qty, .harga', function() {
                let row = $(this).closest('[data-repeater-item]');

                let qty = parseFloat(row.find('.qty').val()) || 0;
                let harga = parseFloat(bersihkan(row.find('.harga').val())) || 0;

                let total = qty * harga;

                row.find('.subtotal').val(formatRupiah(total));
            });
        })
    </script>

    <script>
        $(document).ready(function() {

            let selectedAsetId = "{{ $kendaraan->aset_id }}";

            $('#jenis_aset_id').on('change', function() {

                let jenis_id = $(this).val();

                $('#aset_id').html('<option>Loading...</option>');

                if (!jenis_id) return;

                $.ajax({
                    url: '/get-data/' + jenis_id,
                    type: 'GET',
                    dataType: 'json',

                    success: function(data) {

                        $('#aset_id').empty();
                        $('#aset_id').append('<option value="">-- Pilih Kendaraan --</option>');

                        data.forEach(function(item) {

                            let selected = (item.id == selectedAsetId) ? 'selected' :
                                '';

                            $('#aset_id').append(`
                        <option value="${item.id}" ${selected}>
                            ${item.nama_aset} - ${item.no_polisi}
                        </option>
                    `);
                        });

                        // reset setelah dipakai sekali
                        selectedAsetId = null;
                    }
                });
            });

        });
    </script>

    <script>
        $('.form-repeater').repeater({
            show: function() {
                $(this).slideDown();
            },
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>

    <script>
        $('#foto1').on('change', function(event) {

            let file = event.target.files[0];

            if (!file) return;

            let reader = new FileReader();

            reader.onload = function(e) {
                $('#previewFoto1').attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });

        $('#foto2').on('change', function(event) {

            let file = event.target.files[0];

            if (!file) return;

            let reader = new FileReader();

            reader.onload = function(e) {
                $('#previewFoto2').attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endpush
