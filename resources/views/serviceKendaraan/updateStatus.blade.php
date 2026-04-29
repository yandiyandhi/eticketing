@extends('layouts.app')
@section('title', 'Update Status Service Kendaraan')
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
                    <h5 class="modal-title">Update Status Service Kendaraan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('service.updateStatus', $service->uuid) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="active" class="form-control status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="disetujui">Disetujui</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update</button>
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
        $('.status').select2();
    </script>
@endpush
