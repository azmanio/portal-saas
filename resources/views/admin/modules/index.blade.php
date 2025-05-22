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
                List Module
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <x-admin.datatable>
        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>List Module</h4>
                <a href="{{ route('module.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-user-plus"></i>
                    Add Module
                </a>
            </div>
        </x-slot:cardTitle>
        <x-slot:thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Module</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($modules as $module)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $module->module_name ?? '-' }}</td>
                    <td class="text-center">
                        @if ($module->status)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('modules.edit', $module) }}">
                            <i class="fa fa-edit text-warning"></i>
                        </a>
                        <a href="{{ route('modules.destroy', $module) }}" data-confirm-delete="true">
                            <i class="fa fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-admin.datatable>
@endsection
