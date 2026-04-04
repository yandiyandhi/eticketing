@extends('layouts.app')
@section('title', 'Update Password')
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
                    <h5 class="modal-title">Update Password : <b>{{ $user->name }}</b></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.updatePassword', $user->uuid) }}">
                        @csrf
                        @method('PUT') <div class="modal-body">

                            <div class="mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                                <small id="error" style="color:red;"></small>
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
    <script>
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const error = document.getElementById('error');

        function validatePassword() {
            if (confirmPassword.value.length === 0) {
                error.textContent = "";
                return;
            }

            if (password.value !== confirmPassword.value) {
                error.textContent = "Password tidak sama";
                error.style.color = "red";
            } else {
                error.textContent = "Password cocok";
                error.style.color = "green";
            }
        }

        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);
    </script>
@endpush
