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
            <div class="col-md">
                <table id="table" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Catagory</th>
                            <th>Unit</th>
                            <th>Reg Numb</th>
                            <th>Tax</th>
                            <th>Expire</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($datas->count()) @foreach($datas as $data)

                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>

                            <td>{{ $data->categoryletter->slug }}</td>
                            <td>
                                {{ $data->unit->name }}
                            </td>
                            <td>
                                {{ $data->reg_num }}
                            </td>
                            <td>
                                {{ $data->tax }}
                            </td>
                            <td>
                                {{ $data->expire_date }}
                            </td>

                            <td>
                                <a
                                    href="/dashboard/letter/{{ $data->reg_num }}"
                                    class="badge bg-success"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Detail User"
                                    ><i class="bi bi-eye"></i
                                ></a>
                                <a
                                    href="/dashboard/unit/{{ $data->reg_num  }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit Unit"
                                    ><i class="bi bi-pencil-square"></i
                                ></a>

                                <form
                                    action="/dashboard/unit/{{ $data->reg_num  }}"
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
                            <td colspan="6" class="text-center">
                                Data Not Found
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-8">
                        {{ $datas->onEachside(2)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row"></div>
    </div>
</div>

@endsection
