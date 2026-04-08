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
                    <form method="POST" action="{{ route('role.update', $role->id) }}">
                        @csrf
                        @method('PUT') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $role->name) }}" required>
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
