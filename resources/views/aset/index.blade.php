@extends('layouts.app')
@section('title', 'Aset')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-6">
                <div class="col-xxl-6 col-md-6">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="mb-1">Aset Elektronik</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @forelse ($countElektronik as $item)
                                    <li class="mb-4 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-label-success rounded p-1_5"><i
                                                class="fa-solid fa-{{ match (strtolower($item->name)) {
                                                    'hp' => 'mobile',
                                                    'laptop' => 'laptop',
                                                    'komputer' => 'desktop',
                                                    'keyboard' => 'keyboard',
                                                    'mouse' => 'computer-mouse',
                                                    'printer' => 'print',
                                                    'mobil' => 'car',
                                                    'motor' => 'motorcycle',
                                                    'tablet' => 'tablet',
                                                    default => 'ban',
                                                } }} ti-md"></i>
                                        </div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                            <h6 class="mb-0 ms-4">{{ $item->name ? ucwords($item->name) : '' }}</h6>
                                            <div class="d-flex">
                                                <p class="mb-2">{{ $item->total ? $item->total : '0' }}</p>
                                                <p class="ms-4 text-success mb-0">Jumlah</p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="mb-1">Aset Mobil & Motor</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @forelse ($countMobil as $item)
                                    <li class="mb-4 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-label-success rounded p-1_5"><i
                                                class="fa-solid fa-{{ match (strtolower($item->name)) {
                                                    'hp' => 'mobile',
                                                    'laptop' => 'laptop',
                                                    'komputer' => 'desktop',
                                                    'keyboard' => 'keyboard',
                                                    'mouse' => 'computer-mouse',
                                                    'printer' => 'print',
                                                    'mobil' => 'car',
                                                    'motor' => 'motorcycle',
                                                    'tablet' => 'tablet',
                                                    default => 'ban',
                                                } }} ti-md"></i>
                                        </div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                            <h6 class="mb-0 ms-4">{{ $item->name ? ucwords($item->name) : '' }}</h6>
                                            <div class="d-flex">
                                                <p class="mb-2">{{ $item->total ? $item->total : '0' }}</p>
                                                <p class="ms-4 text-success mb-0">Jumlah</p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                                @forelse ($infoKendaraan as $item)
                                    <li class="mb-4 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-label-danger rounded p-1_5">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap">
                                            <h6 class="mb-0 ms-4">{{ $item->merk ? ucwords($item->merk) : '' }}
                                                {{ $item->model ? ucwords($item->model) : '' }}</h6>
                                            <div class="d-flex">
                                                @if ($item->pajak_stnk && $item->pajak_stnk <= now()->addDays(14))
                                                    <p class="ms-4 text-danger mb-0" style="font-size: 10pt;">
                                                        STNK :
                                                        {{ \Carbon\Carbon::parse($item->pajak_stnk)->format('d M Y') }}
                                                    </p>
                                                @endif

                                                @if ($item->pajak_bpkb && $item->pajak_bpkb <= now()->addDays(14))
                                                    <p class="ms-4 text-danger mb-0" style="font-size: 10pt;">
                                                        | BPKB :
                                                        {{ \Carbon\Carbon::parse($item->pajak_bpkb)->format('d M Y') }}
                                                    </p>
                                                @endif

                                                @if ($item->kir && $item->kir <= now()->addDays(14))
                                                    <p class="ms-4 text-danger mb-0" style="font-size: 10pt;">
                                                        | KIR : {{ \Carbon\Carbon::parse($item->kir)->format('d M Y') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
                                                <th>{{ $asetelektronik->firstItem() + $loop->iteration }}</th>
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
                                                <th>{{ $asetelektronik->firstItem() + $loop->iteration }}</th>
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
