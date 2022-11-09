@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }} Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/letter">Letters</a>
    </li>

    <li class="breadcrumb-item">
        <a
            href="/dashboard/unit/letters/data/{{ $data->categoryletters->slug }}"
            >Letters Data</a
        >
    </li>
    <li class="breadcrumb-item active">{{ $title }} Management</li>
</ol>
@php $date_now = date("Y/m/d"); @endphp

<div class="card col-md">
    <div class="card-header">Detail Letter</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Unit</span><br />
                        {{$data->unit->name}}
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold"
                            >Registration Number</span
                        >
                        <br />{{ $data->regNum }}
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Owner</span>
                        <br />{{ $data->owner }}
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold"> Address </span
                        ><br />{{ $data->owner_add }}
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">
                            Registration Year </span
                        ><br />{{ $data->reg_year }}
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">
                            Location Code </span
                        ><br />{{ $data->loc_code }}
                    </li>
                    @if($data->tax)
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold"> Date Tax </span
                        ><br />
                        <span
                            class="text-{{ \Lazuardicode::expire($data->tax,$date_now) }}"
                        >
                            {{ \Carbon\Carbon::parse($data->tax)->format('d/m/Y') }}
                        </span>
                    </li>
                    @endif
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold"> Expire Date </span
                        ><br />
                        <span
                            class="text-{{ \Lazuardicode::expire($data->expire_date,$date_now) }}"
                        >
                            {{ \Carbon\Carbon::parse($data->expire_date)->format('d/m/Y') }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">
                        File
                    </li>
                    <li class="list-group-item">
                        <img
                            class="rounded-circle d-block shadow my-3"
                            src="http://source.unsplash.com/200x200?truck"
                            alt=""
                            width="50"
                        />
                        <a href="#">Change</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        Terakhir diupdate : {{ $data->updated_at->diffForHumans() }}
    </div>
</div>
@endsection
