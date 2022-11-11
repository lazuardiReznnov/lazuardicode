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
    <div class="card-header fw-bold">Spesification</div>
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
                        <b>Registration number</b><br />
                        {{ $data->name }}
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
                        <b>Engine Number</b><br />
                        {{ $data->engine_numb}}
                    </li>
                    <li class="list-group-item">
                        <b>Color</b><br />
                        {{ $data->color}}
                    </li>
                    <li class="list-group-item">
                        <b>Year</b><br />
                        {{ $data->year}}
                    </li>
                    <li class="list-group-item">
                        <b>Flag</b><br />
                        {{ $data->flag->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Group</b><br />
                        {{ $data->group->name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header fw-bold text-uppercase">Letter</div>
    <div class="card-body">
        <div class="row">
            @foreach($data->Letter as $let)
            <div class="col-md">
                <ul class="list-group">
                    <li
                        class="list-group-item active text-uppercase"
                        aria-current="true"
                    >
                        {{ $let->categoryletters->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Registration No.</b><br />{{ $let->regNum }}
                    </li>
                    <li class="list-group-item">
                        <b>Owner</b><br />{{ $let->owner }}
                    </li>
                    <li class="list-group-item">
                        <b>Registration Year</b><br />
                        {{ $let->reg_year }}
                    </li>
                    <li class="list-group-item">
                        <b>Location Code</b><br />{{ $let->loc_code }}
                    </li>
                    @if($let->tax != 0)
                    <li class="list-group-item">
                        @php $date_now = date("Y/m/d"); @endphp

                        <b>Tax</b><br /><span
                            class="text-{{ \Lazuardicode::expire($let->tax,$date_now) }}"
                        >
                            {{ $let->tax }}</span
                        >
                    </li>
                    @endif
                    <li class="list-group-item">
                        <b>expire date</b><br />
                        <span
                            class="text-{{ \Lazuardicode::expire($let->expire_date,$date_now) }}"
                        >
                            {{ $let->expire_date }}</span
                        >
                    </li>
                </ul>
            </div>

            @endforeach
        </div>
    </div>
</div>

@endsection
