@extends('layouts.admin')

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
            <li class="nav-item active">
                List User
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <x-admin.datatable>
        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>List User</h4>
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-user-plus"></i>
                    Add User
                </a>
            </div>
        </x-slot:cardTitle>
        <x-slot:thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Role</th>
                <th class="text-center">Email</th>
                <th class="text-center">No HP</th>
                <th class="text-center">Nama Institusi</th>
                <th class="text-center">Tipe Institusi</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $user->name ?? '-' }}</td>
                    <td class="text-center">{{ $user->role ?? '-' }}</td>
                    <td class="text-center">{{ $user->email ?? '-' }}</td>
                    <td class="text-center">{{ $user->phone ?? '-' }}</td>
                    <td class="text-center">{{ $user->institution_name ?? '-' }}</td>
                    <td class="text-center">{{ strtoupper($user->institution_type ?? '-') }}</td>
                    <td class="text-center">
                        @if ($user->status)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', $user) }}">
                            <i class="fa fa-edit text-warning"></i>
                        </a>
                        <a href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">
                            <i class="fa fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-admin.datatable>
@endsection
