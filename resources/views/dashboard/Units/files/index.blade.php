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
    </div>
</div>
<div class="card">
    <div class="card-header">List File</div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <a
                    href="/dashboard/unit/fileUnit/create"
                    class="btn btn-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add New Unit"
                >
                    <i class="fas fa-plus-circle"></i> Add
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
                    <th>Numb Plate</th>
                    <th>filename</th>

                    <th>File</th>
                    <th>Description</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if($datas->count()) @foreach($datas as $data)

                <tr>
                    <th scope="row">
                        {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                    </th>
                    <td>{{ $data->unit->name }}</td>
                    <td>
                        {{ $data->name}}
                    </td>

                    <td>
                        @if($data->pic)
                        <a href="{{ asset('storage/'. $data->pic) }}">view</a>

                        @else - @endif
                    </td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->updated_at->diffForHumans() }}</td>
                    <td>
                        <a
                            href="/dashboard/unit/fileUnit/{{ $data->slug }}/edit"
                            class="badge bg-warning"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit Unit"
                            ><i class="bi bi-pencil-square"></i
                        ></a>

                        <form
                            action="/dashboard/unit/fileUnit/{{ $data->slug }}"
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
