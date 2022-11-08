@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Letter Unit Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/unit">Unit</a></li>
    <li class="breadcrumb-item active">Letter Unit Management</li>
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
    </div>
</div>

<div class="card">
    <div class="card-header text-uppercase">Category Letters</div>
    <div class="card-body">
        <div class="row">
            @foreach($data as $category)
            <div class="col col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        {{ $category->name }}
                    </div>
                    <div class="card-body">
                        {{ $category->description }}
                    </div>
                    <div
                        class="card-footer d-flex align-items-center justify-content-between"
                    >
                        <a
                            class="small text-white stretched-link"
                            href="/dashboard/unit/letters/data/{{ $category->letter->slug }}"
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
    </div>
</div>

@endsection
