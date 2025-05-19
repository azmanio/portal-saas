@extends('layouts.admin')

@section('title', 'List Plan')

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
                List Plan
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <x-admin.datatable>
        <x-slot:cardTitle>
            <div class="d-flex justify-content-between align-items-center">
                <h4>List Plan</h4>
                <a href="{{ route('plan.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-user-plus"></i>
                    Add Plan
                </a>
            </div>
        </x-slot:cardTitle>
        <x-slot:thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Plan</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah User</th>
                <th class="text-center">Feature</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($plans as $plan)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $plan->plan_name }}</td>
                    <td class="text-center">{{ $plan->description }}</td>
                    <td class="text-center">Rp{{ $plan->formatted_price }}</td>
                    <td class="text-center">{{ $plan->user_qty }}</td>
                    <td>
                        {{ $plan->plan_features->map(function ($feature) {
                                return $feature->feature->feature_name;
                            })->implode(', ') }}
                    </td>
                    <td class="text-center">
                        <span class="badge bg-{{ $plan->status_badge }}">
                            {{ $plan->status_label }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('plan.edit', $plan) }}">
                            <i class="fa fa-edit text-warning"></i>
                        </a>
                        <a href="{{ route('plan.destroy', $plan) }}" data-confirm-delete="true">
                            <i class="fa fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-admin.datatable>
@endsection
