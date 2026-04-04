@extends('layouts.app')
@section('title', 'Request Ticketing')
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
                    <h5 class="modal-title">Update Status</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ticketing.updateStatus', ['id' => $ticket->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="status_id" class="form-control" required>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $ticket->status_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">KPI</label>
                                <select name="kpi_id" class="form-control" required>
                                    <option value="" selected>-- Pilih KPI --</option>
                                    @foreach ($kpi as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $ticket->kpi_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control"
                                    value="{{ $ticket->keterangan ?? '' }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update Status</button>
                    </form>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

    </div>
    @include('layouts.footercontent')
@endsection
