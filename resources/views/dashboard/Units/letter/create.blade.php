@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }} Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/letter">Letters</a>
    </li>

    <li class="breadcrumb-item active">{{ $title }} Management</li>
</ol>
<div class="card col-md-6">
    <div class="card-header">Form add Letter</div>
    <div class="card-body">
        <form action="/dashboard/unit/letter" method="post">
            @csrf
            <div class="form-floating mb-3">
                <select
                    class="form-select @error('unit_id') is-invalid @enderror"
                    id="unit"
                    aria-label="unit"
                    name="unit_id"
                >
                    <option selected>Select unit</option>
                    @foreach($data_unit as $unit) @if(old('unit_id')==$unit->id)
                    <option value="{{ $unit->id }}" selected>
                        {{ $unit->name }}
                    </option>
                    @endif
                    <option value="{{ $unit->id }}">
                        {{ $unit->name }}
                    </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Unit</label>
                @error('unit_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select
                    class="form-select @error('category_letters_id') is-invalid @enderror"
                    id="category_letters"
                    aria-label="category_letters"
                    name="category_letters_id"
                >
                    <option selected>Select category_letters</option>
                    @foreach($data_category_letters as $category_letters)
                    @if(old('category_letters_id')==$category_letters->id)
                    <option value="{{ $category_letters->id }}" selected>
                        {{ $category_letters->name }}
                    </option>
                    @endif
                    <option value="{{ $category_letters->id }}">
                        {{ $category_letters->name }}
                    </option>
                    @endforeach
                </select>
                <label for="floatingSelect">category_letters</label>
                @error('category_letters')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('regNum') is-invalid @enderror"
                    id="regNum"
                    placeholder="Registration  Number"
                    name="regNum"
                />
                <label for="floatingInput">Registration Number</label>
                @error('regNum')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('owner') is-invalid @enderror"
                    id="owner"
                    placeholder="Owner"
                    name="owner"
                />
                <label for="floatingInput">Owner</label>
                @error('owner')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <textarea
                    class="form-control"
                    placeholder="Address"
                    id="floatingTextarea"
                    name="address"
                ></textarea>
                <label for="floatingTextarea">Address</label>
            </div>

            <div class="mb-3 form-floating col-md-4">
                @php $now = date('Y'); @endphp
                <select name="reg_year" class="form-select">
                    <option selected>--Choice Year--</option>
                    @for ($a=2012;$a<=$now;$a++)
                    <option value="{{ $a }}">{{ $a }}</option>
                    @endfor
                </select>
                <label for="year" class="form-label">Manufaturing Year</label>
                @error('reg_year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('loc_code') is-invalid @enderror"
                    id="loc_code"
                    placeholder="loc_code"
                    name="loc_code"
                />
                <label for="floatingInput">Location</label>
                @error('loc_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('lpc') is-invalid @enderror"
                    id="lpc"
                    placeholder="lpc"
                    name="lpc"
                />
                <label for="floatingInput">License Plate Color</label>
                @error('lpc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('vodn') is-invalid @enderror"
                    id="vodn"
                    placeholder="vodn"
                    name="vodn"
                />
                <label for="floatingInput">Vehicle Ownership Data Number</label>
                @error('vodn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('vodn') is-invalid @enderror"
                    id="vodn"
                    placeholder="vodn"
                    name="vodn"
                />
                <label for="floatingInput">Vehicle Ownership Data Number</label>
                @error('vodn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="date"
                    class="form-control @error('tax') is-invalid @enderror"
                    id="tax"
                    placeholder="tax"
                    name="tax"
                />
                <label for="floatingInput">Tax Date</label>
                @error('tax')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input
                    type="date"
                    class="form-control @error('expire_date') is-invalid @enderror"
                    id="expire_date"
                    placeholder="expire_date"
                    name="expire_date"
                />
                <label for="floatingInput">Expire Date</label>
                @error('expire_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary">Save</button>
        </form>
    </div>
</div>
@endsection
