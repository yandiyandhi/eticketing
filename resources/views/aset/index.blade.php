@extends('layouts.app')
@section('title', 'Aset')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12 my-4">
                <h6 class="text-body-secondary">List Request</h6>
                <div class="nav-align-top nav-tabs-shadow">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-elektronik" aria-controls="navs-justified-elektronik"
                                aria-selected="true">
                                <span class="d-sm-inline-flex align-items-center">
                                    Elektronik
                                </span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-mobil" aria-controls="navs-justified-mobil"
                                aria-selected="false">
                                <span class="d-sm-inline-flex align-items-center">Mobil/Motor</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show" id="navs-justified-elektronik" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between mb-4">
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="requestelektronik"
                                        placeholder="Search request..." value="{{ request('requestelektronik') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table" style="font-size: 11pt;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Jenis</th>
                                            <th>Kondisi</th>
                                            <th>Merk</th>
                                            <th>Model</th>
                                            <th>Kantor</th>
                                            <th>User</th>
                                            <th>Divisi</th>
                                            <th>Lokasi</th>
                                            <th>Tgl Beli</th>
                                            <th>Keterangan</th>
                                            <th>QR Code</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 10pt;">
                                        @forelse ($asetelektronik as $item)
                                            <tr>
                                                <th>{{ $asetelektronik->firstItem() + $loop->index }}</th>
                                                <td>{{ $item->kode_aset ?? ' ' }}</td>
                                                <td>{{ $item->nama_aset ?? ' ' }}</td>
                                                <td>{{ $item->jenis_aset ? ucwords($item->jenis_aset->name) : '' }}</td>
                                                <td>{{ $item->kondisi ? ucwords($item->kondisi->name) : '' }}</td>
                                                <td>{{ $item->merk ?? ' ' }}</td>
                                                <td>{{ $item->model ?? ' ' }}</td>
                                                <td>{{ $item->kantor ? ucwords($item->kantor->name) : '' }}</td>
                                                <td>{{ $item->user ? ucwords($item->user->name) : ' ' }}</td>
                                                <td>{{ $item->divisi ? ucwords($item->divisi->name) : ' ' }}</td>
                                                <td>{{ $item->kantor ? ucwords($item->kantor->name) : ' ' }}</td>
                                                <td>{{ $item->tanggal_beli ?? ' ' }}</td>
                                                <td>{{ $item->keterangan ?? ' ' }}</td>
                                                <td>
                                                    @if ($item->qrcode)
                                                        <a href="{{ asset('storage/qrcode/' . $item->qrcode) }}"
                                                            target="_blank">
                                                            Lihat QR
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $asetelektronik->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-justified-mobil" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between mb-2">
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="requestmobil"
                                        placeholder="Search request..." value="{{ request('requestmobil') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table" style="font-size: 11pt;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Jenis</th>
                                            <th>Kondisi</th>
                                            <th>Divisi</th>
                                            <th>Lokasi</th>
                                            <th>Merk</th>
                                            <th>No Polisi</th>
                                            <th>Pajak STNK</th>
                                            <th>Pajak BPKB</th>
                                            <th>KIR</th>
                                            <th>Tgl Beli</th>
                                            <th>Keterangan</th>
                                            <th>QR Code</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 10pt;">
                                        @forelse ($asetelmobil as $item)
                                            <tr>
                                                <th>{{ $asetelektronik->firstItem() + $loop->index }}</th>
                                                <td>{{ $item->kode_aset ?? ' ' }}</td>
                                                <td>{{ $item->nama_aset ?? ' ' }}</td>
                                                <td>{{ $item->jenis_aset ? ucwords($item->jenis_aset->name) : '' }}</td>
                                                <td>{{ $item->kondisi ? ucwords($item->kondisi->name) : '' }}</td>
                                                <td>{{ $item->divisi ? ucwords($item->divisi->name) : ' ' }}</td>
                                                <td>{{ $item->kantor ? ucwords($item->kantor->name) : ' ' }}</td>
                                                <td>{{ ucwords($item->merk) ?? ' ' }}</td>
                                                <td>{{ $item->no_polisi ?? ' ' }}</td>
                                                <td>{{ $item->pajak_stnk ?? ' ' }}</td>
                                                <td>{{ $item->pajak_bpkb ?? ' ' }}</td>
                                                <td>{{ $item->kir ?? ' ' }}</td>
                                                <td>{{ $item->tanggal_beli ?? ' ' }}</td>
                                                <td>{{ $item->keterangan ?? ' ' }}</td>
                                                <td>
                                                    @if ($item->qrcode)
                                                        <a href="{{ asset('storage/qrcode/' . $item->qrcode) }}"
                                                            target="_blank">
                                                            Lihat QR
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $asetelmobil->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column Search -->
            {{-- <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">List Aset</h6>
                    <div class="col-4 justify-content-end d-flex">

                    </div>

                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table" style="font-size: 12pt;">
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
                            @forelse ($asetelektronik as $item)
                                <tr>
                                    <th>{{ $asetelektronik->firstItem() + $loop->index }}</th>
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
                    {{ $asetelektronik->links('pagination::bootstrap-5') }}
                </div>
            </div> --}}
            <!--/ Column Search -->
        </div>

        @include('layouts.footercontent')
    </div>

    {{-- @include('partials.alert') --}}
@endsection
@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const params = new URLSearchParams(window.location.search);

            let tab = '#navs-justified-elektronik'; // default

            if (params.has('requestmobil')) {
                tab = '#navs-justified-mobil';
            } else if (params.has('requestelektronik')) {
                tab = '#navs-justified-elektronik';
            } else if (params.get('tab')) {
                tab = params.get('tab');
            }

            const trigger = document.querySelector(`[data-bs-target="${tab}"]`);
            if (trigger) {
                const tabInstance = new bootstrap.Tab(trigger);
                tabInstance.show();
            }
        });
    </script>
@endpush
