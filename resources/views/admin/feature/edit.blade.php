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
                <a href="{{ route('feature.index') }}">Feature</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item active">
                Edit Feature
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <x-admin.form :action="route('feature.update', $feature)" method="PUT">
        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit Feature</h4>
            </div>
        </x-slot:cardTitle>

        <div class="mb-3">
            <label class="form-label">Nama Feature</label>
            <input name="feature_name" class="form-control" value="{{ old('feature_name', $feature->feature_name) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" value="" required>{{ old('description', $feature->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="module_id" class="form-label">Module</label>
            <select name="module_id" id="module_id" class="form-select">
                <option value="" disabled>
                    -- Pilih Module --
                </option>
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}" {{ $module->id == $feature->module_id ? 'selected' : '' }}>
                        {{ $module->module_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input onclick="window.location.href='{{ route('feature.toggleStatus', $feature) }}'"
                    {{ $feature->status ? 'checked' : '' }} type="checkbox" class="form-check-input" id="customSwitch">
                <label class="form-check-label" for="customSwitch">
                    {{ $feature->status ? 'Aktif' : 'Nonaktif' }}
                </label>
            </div>
        </div>
    </x-admin.form>
@endsection
