@extends('layouts.app')
@section('title', 'Tambah User')
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
                    <h5 class="modal-title">Tambah User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        @method('POST') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Departemen</label>
                                <select name="department_id" class="form-control deptselect2" required>
                                    <option value="">-- Pilih Departemen --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Kantor</label>
                                <select name="kantor_id" class="form-control kantor" required>
                                    <option value="">-- Pilih Kantor --</option>
                                    @foreach ($kantors as $kantor)
                                        <option value="{{ $kantor->id }}">
                                            {{ $kantor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                                    required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="active" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
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
        $('.deptselect2, .kantor').select2();
    </script>
@endpush
