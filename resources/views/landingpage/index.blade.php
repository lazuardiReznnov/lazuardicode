@extends('layout.landingpage.main') @section('content')
<!-- searchbar -->
<div class="row mt-3 p-3 justify-content-center">
    <div class="col-md-6">
        <form action="">
            <div class="input-group mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="search"
                    aria-label="search"
                    aria-describedby="search"
                />
                <button
                    class="btn btn-outline-secondary"
                    type="submit"
                    id="search"
                >
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Endsearchbar -->
<div class="row justify-content-between g-2">
    <div class="col-lg-2 p-2 card-hover border border-1 me-2 shadow-sm">
        <a href="#" class="d-flex flex-row text-decoration-none text-slate-500">
            <div class="fs-3 me-4">
                <i class="bi bi-map"></i>
            </div>
            <div>
                <h4 class="text-16 fw-bold text-uppercase">Rute</h4>
                <p class="text-12">Description</p>
            </div>
        </a>
    </div>
    <div class="col-lg-2 p-2 card-hover border border-1 me-2 shadow-sm">
        <a href="#" class="d-flex flex-row text-decoration-none text-slate-500">
            <div class="fs-2 me-4">
                <i class="bi bi-truck"></i>
            </div>
            <div>
                <h4 class="text-16 fw-bold text-uppercase">Unit</h4>
                <p class="text-12">Description</p>
            </div>
        </a>
    </div>
    <div class="col-lg-2 p-2 card-hover border border-1 me-2 shadow-sm">
        <a href="#" class="d-flex flex-row text-decoration-none text-slate-500">
            <div class="fs-2 me-4">
                <i class="bi bi-file-earmark-excel"></i>
            </div>
            <div>
                <h4 class="text-16 fw-bold text-uppercase">Report</h4>
                <p class="text-12">Description</p>
            </div>
        </a>
    </div>
    <div class="col-lg-2 p-2 card-hover border border-1 me-2 shadow-sm">
        <a href="#" class="d-flex flex-row text-decoration-none text-slate-500">
            <div class="fs-3 me-4">
                <i class="bi bi-gear"></i>
            </div>
            <div>
                <h4 class="text-16 fw-bold text-uppercase">Sparepart</h4>
                <p class="text-12">Description</p>
            </div>
        </a>
    </div>
    <div class="col-lg-2 p-2 card-hover border border-1 me-2 shadow-sm">
        <a href="#" class="d-flex flex-row text-decoration-none text-slate-500">
            <div class="fs-3 me-4">
                <i class="bi bi-person-rolodex"></i>
            </div>
            <div>
                <h4 class="text-16 fw-bold text-uppercase">Employee</h4>
                <p class="text-12">Description</p>
            </div>
        </a>
    </div>
</div>
@endsection
