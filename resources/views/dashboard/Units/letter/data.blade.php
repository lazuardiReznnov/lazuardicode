@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/letter/">Letter</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
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
    <div class="card-header">Letter List</div>
    <div class="card-body">
        <table id="table" class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reg Numb</th>
                    <th>id</th>
                    <th>Owner</th>
                    <th>Tax</th>
                    <th>expire Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if($datas->count()) @foreach($datas as $data) @php $date_now =
                date("Y/m/d"); @endphp

                <tr>
                    <th scope="row">
                        {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                    </th>
                    <td>{{ $data->unit->name }}</td>
                    <td>{{ $data->regNum }}</td>
                    <td>
                        {{ $data->owner }}
                    </td>
                    <td>
                        @if($data->tax)
                        <span
                            class="text-{{ \Lazuardicode::expire($data->tax,$date_now) }}"
                        >
                            {{ \Carbon\Carbon::parse($data->tax)->format('d/m/Y') }}
                        </span>
                        @else - @endif
                    </td>
                    <td>
                        <span
                            class="text-{{ \Lazuardicode::expire($data->expire_date,$date_now) }}"
                        >
                            {{ \Carbon\Carbon::parse($data->expire_date)->format('d/m/Y') }}
                        </span>
                    </td>

                    <td>
                        <a
                            href="/dashboard/unit/letter/{{ $data->id}}"
                            class="badge bg-success"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Detail User"
                            ><i class="bi bi-eye"></i
                        ></a>
                        <a
                            href="/dashboard/unit/letter/{{ $data->id}}/edit"
                            class="badge bg-warning"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit Unit"
                            ><i class="bi bi-pencil-square"></i
                        ></a>

                        <form
                            action="/dashboard/unit/letter/{{ $data->id }}"
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
                {{ $datas->onEachside(2)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
