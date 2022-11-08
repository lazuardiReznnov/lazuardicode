@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Detail Unit</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/units">Unit Management</a>
    </li>
    <li class="breadcrumb-item active">Detail Unit</li>
</ol>
<div class="card">
    <div class="card-header fw-bold">
        {{ $data->name }}
    </div>
    <div class="card-body">
        <div class="row justify-content-between mb-5">
            <div class="col-md-6">
                @if($data->pic)
                <img
                    width="200"
                    src="{{ asset('storage/'. $data->pic) }}"
                    class="rounded-circle mx-auto d-block shadow my-3"
                    alt="about Image"
                />
                @else
                <img
                    class="rounded-circle mx-auto d-block shadow my-3"
                    src="http://source.unsplash.com/200x200?truck"
                    alt=""
                    width="250"
                />
                @endif
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <b>Flag</b><br />
                        {{ $data->flag->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Group</b><br />
                        {{ $data->group->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Category</b><br />
                        {{ $data->type->category->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Brand/Model/Type</b><br />
                        {{ $data->type->brand->name }} {{ $data->type->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Vin</b><br />
                        {{ $data->vin}}
                    </li>
                    <li class="list-group-item">
                        <b>Color</b><br />
                        {{ $data->color}}
                    </li>
                    <li class="list-group-item">
                        <b>Year</b><br />
                        {{ $data->year}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
