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
    <div class="card-header">Update Expire Letter</div>
    <div class="card-body">
        <form
            action="/dashboard/unit/letter/expirestore/{{ $data->id }}"
            method="post"
        >
            @csrf @method('put')

            <div class="form-floating mb-3">
                <input
                    type="date"
                    class="form-control @error('expire_date') is-invalid @enderror"
                    id="expire_date"
                    placeholder="expire_date"
                    name="expire_date"
                    value="{{ old('expire_date',$data->expire_date) }}"
                />
                <label for="floatingInput">ExpireDate</label>
                @error('expire_date')
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
