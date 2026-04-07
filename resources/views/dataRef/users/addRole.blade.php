@extends('layouts.app')
@section('title', 'Tambah Role')
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
                    <h5 class="modal-title">Tambah Role</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.assignRole', $user->id) }}">
                        @csrf
                        @method('PUT') <div class="modal-body">
                            <div class="mb-2">
                                <select name="role_name" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->name }}"
                                            {{ $user->roles->contains('name', $item->name) ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
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
@endpush
