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
                Tambah Module
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <x-admin.form :action="route('module.store')">
        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>Tambah Module</h4>
            </div>
        </x-slot:cardTitle>

        <div class="mb-3">
            <label class="form-label">Nama Module</label>
            <input name="module_name" class="form-control" value="{{ old('module_name') }}" required>
        </div>

    </x-admin.form>
@endsection
