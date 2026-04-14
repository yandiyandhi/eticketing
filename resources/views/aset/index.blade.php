@extends('layouts.app')
@section('title', 'Aset')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('partials.alert')
            <!-- Column Search -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">List Aset</h6>
                    <div class="col-4 justify-content-end d-flex">
                        <form class="d-flex ms-auto" method="GET" role="search">
                            <input class="form-control form-control-sm me-2" type="search" name="request"
                                placeholder="Search request..." value="{{ request('request') }}">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="ti ti-search"></i></button>
                        </form>
                    </div>

                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Nama Aset</th>
                                <th>Jenis</th>
                                <th>Kondisi</th>
                                <th>Merk</th>
                                <th>Model</th>
                                <th>Serial Number</th>
                                <th>Spesifikasi</th>
                                <th>No Polisi</th>
                                <th>Pajak STNK</th>
                                <th>Pajak BPKB</th>
                                <th>KIR</th>
                                <th>Divisi</th>
                                <th>Lokasi</th>
                                <th>Tgl Beli</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aset as $item)
                                <tr>
                                    <th>{{ $aset->firstItem() + $loop->index }}</th>
                                    <td>{{ $item->kode_aset ?? ' ' }}</td>
                                    <td>{{ $item->nama_aset ?? ' ' }}</td>
                                    <td>{{ $item->jenis_aset ? ucwords($item->jenis_aset->name) : '' }}</td>
                                    <td>{{ $item->kondisi ? ucwords($item->kondisi->name) : '' }}</td>
                                    <td>{{ $item->merk ?? ' ' }}</td>
                                    <td>{{ $item->model ?? ' ' }}</td>
                                    <td>{{ $item->serial_number ?? ' ' }}</td>
                                    <td>{{ $item->spesifikasi ?? ' ' }}</td>
                                    <td>{{ $item->no_polisi ?? ' ' }}</td>
                                    <td>{{ $item->pajak_stnk ?? ' ' }}</td>
                                    <td>{{ $item->pajak_bpkb ?? ' ' }}</td>
                                    <td>{{ $item->kir ?? ' ' }}</td>
                                    <td>{{ $item->divisi ?? ' ' }}</td>
                                    <td>{{ $item->kantor ? ucwords($item->kantor->name) : ' ' }}</td>
                                    <td>{{ $item->tanggal_beli ?? ' ' }}</td>
                                    <td>{{ $item->keterangan ?? ' ' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $aset->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        {{-- @include('dataMaster.requestTicketing.reports.modalIt') --}}
        @include('layouts.footercontent')
    </div>
@endsection
@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
