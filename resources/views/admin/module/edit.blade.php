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
            <li class="nav-item">
                <a href="{{ route('module.index') }}">Module</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item active">
                Edit Module
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <x-admin.form :action="route('module.update', $module)" method="PUT">
        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit Module</h4>
            </div>
        </x-slot:cardTitle>
        <div class="mb-3">
            <label class="form-label">Nama Module</label>
            <input name="module_name" class="form-control" value="{{ old('module_name', $module->module_name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input onclick="window.location.href='{{ route('module.toggleStatus', $module) }}'"
                    {{ $module->status ? 'checked' : '' }} type="checkbox" class="form-check-input" id="customSwitch">
                <label class="form-check-label" for="customSwitch">
                    {{ $module->status ? 'Aktif' : 'Nonaktif' }}
                </label>
            </div>
        </div>
    </x-admin.form>
@endsection
