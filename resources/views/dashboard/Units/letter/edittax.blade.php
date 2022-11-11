@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }} Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/letter">Letters</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/letter/data/{{ $data->categoryletters->slug }}"
            >Data Letters</a
        >
    </li>

    <li class="breadcrumb-item active">{{ $title }} Management</li>
</ol>
<div class="card col-md-5">
    <div class="card-header">Update Tax Letter</div>
    <div class="card-body">
        <form
            action="/dashboard/unit/letter/taxstore/{{ $data->id }}"
            method="post"
        >
            @csrf @method('put')

            <div class="form-floating mb-3">
                <input
                    type="date"
                    class="form-control @error('tax') is-invalid @enderror"
                    id="tax"
                    placeholder="tax"
                    name="tax"
                    value="{{ old('tax',$data->tax) }}"
                />
                <label for="floatingInput">Tax Date</label>
                @error('tax')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary">Update</button>
        </form>
    </div>
</div>
@endsection
