@extends('layouts.admin')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('breadcrumbs')
    <div class="page-header">
        <ul class="breadcrumbs px-0">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item active">
                {{ isset($user) ? 'Edit User' : 'Tambah User' }}
            </li>
        </ul>
    </div>
@endsection

@section('content')
    @php
        $formAction = isset($user) ? route('users.update', $user) : route('users.store');
    @endphp
    <x-admin.form :action="$formAction">
        @isset($user)
            @method('PUT')
        @endisset

        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h4>
            </div>
        </x-slot:cardTitle>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input name="name" class="form-control  @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Password
                @isset($user)
                    <small>(biarkan kosong jika tidak ingin mengubah)</small>
                @endisset
            </label>
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                @empty($user) required @endempty>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Confirm Password
                @isset($user)
                    <small>(biarkan kosong jika tidak ingin mengubah)</small>
                @endisset
            </label>
            <input name="password_confirmation" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                @empty($user) required @endempty>
        </div>

        <div class="container-fluid mb-3">
            <div class="row">
                <div class='col-6'>
                    <label class="form-label">Role</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="roleUser" value="user"
                                {{ old('role', $user->role ?? '') === 'User' ? 'checked' : '' }}>
                            <label class="form-check-label" for="roleUser">User</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin"
                                {{ old('role', $user->role ?? '') === 'Admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="roleAdmin">Admin</label>
                        </div>
                    </div>
                </div>
                @isset($user)
                    <div class='col-4'>
                        <label class="form-label">Status</label>
                        <div class="form-check form-switch">
                            <input onclick="window.location.href='{{ route('user.toggleStatus', $user) }}'"
                                {{ $user->status ? 'checked' : '' }} type="checkbox" class="form-check-input" id="customSwitch">
                            <label class="form-check-label" for="customSwitch">
                                {{ $user->status ? 'Aktif' : 'Nonaktif' }}
                            </label>
                        </div>
                    </div>
                @endisset
            </div>
        </div>

        {{-- Bagian form yang disembunyikan --}}
        <div id="user-fields" style="display: none;">
            <div class="mb-3">
                <label class="form-label">No Hp</label>
                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $user->phone ?? '') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Institusi</label>
                <input name="institution_name" type="text"
                    class="form-control @error('institution_name') is-invalid @enderror"
                    value="{{ old('institution_name', $user->institution_name ?? '') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">No Legalitas</label>
                <input name="legality_no" type="text" class="form-control @error('legality_no') is-invalid @enderror"
                    value="{{ old('legality_no', $user->legality_no ?? '') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe Institusi</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="institution_type" id="laz" value="laz"
                            {{ old('institution_type', $user->institution_type ?? '') === 'laz' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laz">LAZ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="institution_type" id="ngo" value="ngo"
                            {{ old('institution_type', $user->institution_type ?? '') === 'ngo' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ngo">NGO</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Core Program</label>
                <input name="core_program" type="text"
                    class="form-control @error('core_program') is-invalid @enderror"
                    value="{{ old('core_program', $user->core_program ?? '') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Karyawan</label>
                <input name="employee_qty" type="number"
                    class="form-control @error('employee_qty') is-invalid @enderror"
                    value="{{ old('employee_qty', $user->employee_qty ?? '') }}">
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
