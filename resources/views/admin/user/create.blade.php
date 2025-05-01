@extends('layouts.admin')

@section('content')
    <h4>Add User</h4>

    <x-admin.form :action="route('user.store')">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="roleUser" value="user">
                    <label class="form-check-label" for="roleUser">User</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin">
                    <label class="form-check-label" for="roleAdmin">Admin</label>
                </div>
            </div>
        </div>

        {{-- Bagian form yang disembunyikan --}}
        <div id="user-fields" style="display: none;">
            <div class="mb-3">
                <label class="form-label">No Hp</label>
                <input name="phone" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Institusi</label>
                <input name="institution_name" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">No Legalitas</label>
                <input name="legality_no" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe Institusi</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="institution_type" id="laz"
                            value="laz">
                        <label class="form-check-label" for="laz">LAZ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="institution_type" id="ngo"
                            value="NGO">
                        <label class="form-check-label" for="ngo">NGO</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Core Program</label>
                <input name="core_program" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Karyawan</label>
                <input name="employee_qty" type="text" class="form-control">
            </div>
        </div>
    </x-admin.form>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userFields = document.getElementById('user-fields');
            const roleRadios = document.querySelectorAll('input[name="role"]');

            function toggleUserFields() {
                const selectedRole = document.querySelector('input[name="role"]:checked');
                if (selectedRole && selectedRole.value === 'user') {
                    userFields.style.display = 'block';
                } else {
                    userFields.style.display = 'none';
                }
            }

            roleRadios.forEach(radio => {
                radio.addEventListener('change', toggleUserFields);
            });

            toggleUserFields();
        });
    </script>
@endpush
