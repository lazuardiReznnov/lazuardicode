@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Form Import Unit</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/units">Unit Management</a>
    </li>
    <li class="breadcrumb-item active">Form Import Unit</li>
</ol>
<div class="card mb-4 col-md-6">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Import Unit
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <form
                    action="/dashboard/unit/file-import"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="mb-3">
                        <label for="image" class="form-label"
                            >Upload Excel</label
                        >

                        <input
                            class="form-control @error('excl') is-invalid @enderror"
                            type="file"
                            id="excl"
                            name="excl"
                            placeholder="choice file"
                        />
                        @error('excl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
