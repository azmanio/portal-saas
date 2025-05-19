@extends('layouts.admin')

@section('title', isset($plan) ? 'Edit Plan' : 'Tambah Plan')

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
                <a href="{{ route('plan.index') }}">Plan</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item active">
                {{ isset($plan) ? 'Edit Plan' : 'Tambah Plan' }}
            </li>
        </ul>
    </div>
@endsection

@section('content')
    @php
        $formAction = isset($plan) ? route('plan.update', $plan) : route('plan.store');
        $selectedFeatures = old('feature', isset($plan) ? $plan->plan_features->pluck('feature_id')->toArray() : []);
    @endphp
    <x-admin.form :action="$formAction">
        @isset($plan)
            @method('PUT')
        @endisset

        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>{{ isset($plan) ? 'Edit Plan' : 'Tambah Plan' }}</h4>
            </div>
        </x-slot:cardTitle>

        <div class="mb-3">
            <label class="form-label">Nama Plan</label>
            <input name="plan_name" class="form-control  @error('plan_name') is-invalid @enderror"
                value="{{ old('plan_name', $plan->plan_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control  @error('description') is-invalid @enderror" required>{{ old('description', $plan->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input name="price" class="form-control  @error('price') is-invalid @enderror"
                value="{{ old('price', $plan->price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah User</label>
            <input type="number" name="user_qty" class="form-control @error('user_qty') is-invalid @enderror"
                value="{{ old('user_qty', $plan->user_qty ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="feature_id" class="form-label">Feature Tersedia</label>
            <div name="feature_id" id="feature_id" class="">
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($features as $index => $feature)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $index }}"
                                value="{{ $feature->id }}" name="feature[]"
                                {{ in_array($feature->id, $selectedFeatures) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineCheckbox{{ $index }}">
                                {{ $feature->feature_name }}
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                @foreach ($statusOptions as $value => $label)
                    <option value="{{ $value }}"
                        {{ old('status', $plan->status ?? 0) == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

    </x-admin.form>
@endsection
