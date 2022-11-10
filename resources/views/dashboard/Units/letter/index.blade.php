@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }} Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">{{ $title }} Management</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <!-- pesan -->
        @if(session()->has('loginError'))
        <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
        >
            {{ session("loginError") }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="close"
            ></button>
        </div>
        @endif @if(session()->has('success'))
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            {{ session("success") }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="close"
            ></button>
        </div>
        @endif
        <!-- endpesan -->
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <a
                    href="/dashboard/unit/letter/create/"
                    class="btn btn-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add New Unit"
                >
                    <i class="fas fa-plus-circle"></i> Add
                </a>
                <a
                    href="/dashboard/unit/letters/file-import-create"
                    class="btn btn-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Import Unit"
                >
                    <i class="fas fa-plus-circle"></i> Import
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-uppercase fw-bold">Category Letters</div>
    <div class="card-body">
        <div class="row">
            @foreach($data as $cat)
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h4 class="fs-6 text-uppercase text-center">
                            {{ $cat->name }}
                        </h4>
                        <p>{{ $cat->description }}</p>
                    </div>
                    <div
                        class="card-footer d-flex align-items-center justify-content-between"
                    >
                        <a
                            class="small text-white stretched-link"
                            href="/dashboard/unit/letter/data/{{ $cat->slug }}"
                            >View Details</a
                        >
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row"></div>
    </div>
</div>

@endsection
