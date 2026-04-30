@extends('layouts.app')
@section('title', 'Edit User')
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
                    <h5 class="modal-title">Edit User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user->uuid) }}">
                        @csrf
                        @method('PUT') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control"
                                    value="{{ old('username', $user->username) }}" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Divisi</label>
                                <select name="divisi_id" class="form-control divisiselect2" required>
                                    <option value="">-- Pilih Divisi --</option>
                                    @foreach ($divisi as $div)
                                        <option value="{{ $div->id }}"
                                            {{ old('divisi_id', $user->divisi_id) == $div->id ? 'selected' : '' }}>
                                            {{ $div->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Jabatan</label>
                                <select name="jabatan_id" class="form-control jabatan" required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}"
                                            {{ old('jabatan_id', $user->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
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
                                        <option value="{{ $kantor->id }}"
                                            {{ old('kantor_id', $user->kantor_id) == $kantor->id ? 'selected' : '' }}>
                                            {{ $kantor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="active" class="form-control status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old('active', $user->active) == '1' ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="0" {{ old('active', $user->active) == '0' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>

                            </div>
                            @can('user.update')
                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                            @else
                                <button type="submit" class="btn btn-secondary mt-4"
                                    @disabled(true)>Update</button>
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
    <script>
        $('.divisiselect2, .kantor, .jabatan, .status').select2();
    </script>
@endpush
