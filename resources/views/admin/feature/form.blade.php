@extends('layouts.admin')

@section('title', isset($feature) ? 'Edit Feature' : 'Tambah Feature')

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
                {{ isset($feature) ? 'Edit Feature' : 'Tambah Feature' }}
            </li>
        </ul>
    </div>
@endsection

@section('content')
    @php
        $formAction = isset($feature) ? route('feature.update', $feature) : route('feature.store');
    @endphp
    <x-admin.form :action="$formAction">
        @isset($feature)
            @method('PUT')
        @endisset

        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>{{ isset($feature) ? 'Edit Feature' : 'Tambah Feature' }}</h4>
            </div>
        </x-slot:cardTitle>

        <div class="mb-3">
            <label class="form-label">Nama Feature</label>
            <input name="feature_name" class="form-control  @error('feature_name') is-invalid @enderror"
                value="{{ old('feature_name', $feature->feature_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $feature->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="module_id" class="form-label">Module</label>
            <select name="module_id" id="module_id" class="form-select @error('module_id') is-invalid @enderror">
                <option value="" selected disabled>
                    -- Pilih Module --
                </option>
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}"
                        {{ (isset($feature) ? $feature->module_id : old('module_id')) == $module->id ? 'selected' : '' }}>
                        {{ $module->module_name }}
                    </option>
                @endforeach
            </select>
        </div>

        @isset($feature)
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
        @endisset

    </x-admin.form>
@endsection
