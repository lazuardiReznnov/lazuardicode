@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Unit Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Unit Management</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <p class="mb-0">Data Unit Management</p>
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

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data List Unit
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <a
                    href="/dashboard/units/create"
                    class="btn btn-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add New Unit"
                >
                    <i class="fas fa-plus-circle"></i> Add
                </a>
                <a
                    href="/dashboard/units/file-import-create"
                    class="btn btn-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Import Unit"
                >
                    <i class="fas fa-plus-circle"></i> Import
                </a>
            </div>
            <div class="col-sm-4 ms-2">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search"
                        aria-label="search"
                        aria-describedby="button-addon2"
                    />
                    <button
                        class="btn btn-outline-primary"
                        type="button"
                        id="button-addon2"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>
        <table id="table" class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Registration</th>
                    <th>Brand/Type</th>
                    <th>Category</th>
                    <th>Group</th>
                    <th>Flag</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if($datas->count()) @foreach($datas as $data)

                <tr>
                    <th scope="row">
                        {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                    </th>

                    <td>{{ $data->name }}</td>
                    <td>
                        {{ $data->type->brand->name }} {{ $data->type->name }}
                    </td>
                    <td>
                        {{ $data->type->category->name }}
                    </td>
                    <td>{{ $data->group->name }}</td>
                    <td>
                        {{ $data->flag->name }}
                    </td>
                    <td>
                        <a
                            href="/dashboard/units/{{ $data->slug }}"
                            class="badge bg-success"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Detail User"
                            ><i class="bi bi-eye"></i
                        ></a>
                        <a
                            href="/dashboard/units/{{ $data->slug }}/edit"
                            class="badge bg-warning"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit Unit"
                            ><i class="bi bi-pencil-square"></i
                        ></a>

                        <form
                            action="/dashboard/units/{{ $data->slug }}"
                            method="post"
                            class="d-inline"
                        >
                            @method('delete') @csrf
                            <button
                                class="badge bg-danger"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Delete Unit"
                                onclick="return confirm('are You sure ??')"
                            >
                                <i class="bi bi-file-x-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach @else
                <tr>
                    <td colspan="6" class="text-center">Data Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-8">
                {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
