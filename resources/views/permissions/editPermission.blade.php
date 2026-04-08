@extends('layouts.app')
@section('title', 'Edit Role')
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
                    <h5 class="modal-title">Edit Role</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permission.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $permission->name) }}" required>
                            </div>
                            @can('permission.update')
                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                            @else
                                <button type="submit" class="btn btn-secondary mt-4" @disabled(true)>
                                    Update
                                </button>
                            @endcan
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
