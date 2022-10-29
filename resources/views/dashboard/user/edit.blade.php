@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Edit User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/user">User Management</a>
    </li>
    <li class="breadcrumb-item active">Edit User</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <a href="/dashboard/user" class="btn btn-primary btn-sm"
            ><i class="fas fa-arrow-alt-circle-left"></i> Back</a
        >
    </div>
</div>
{{ @session('error') }}
<div class="card mb-4 col-md-7">
    <div class="card-header">
        <i class="fas fa-user-edit"></i>
        Edit User
    </div>
    <div class="card-body">
        <form
            action="/dashboard/user/{{ $data->username }}"
            method="post"
            enctype="multipart/form-data"
        >
            @method('put') @csrf
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('username') is-invalid @enderror"
                    id="floatingInput"
                    placeholder="username"
                    name="username"
                    value="{{ old('username',$data->username) }}"
                    required
                />
                <label for="floatingInput">Username</label>
                @error('username')
                <div id="username" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="floatingInput"
                    placeholder="name"
                    name="name"
                    value="{{ old('name',$data->name) }}"
                    required
                />
                <label for="floatingInput">Name</label>
                @error('name')
                <div id="name" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="floatingInput"
                    placeholder="name@example.com"
                    name="email"
                    value="{{ old('email',$data->email) }}"
                    required
                />
                <label for="floatingInput">Email address</label>
                @error('email')
                <div id="email" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select
                    class="form-select @error('role') is-invalid @enderror"
                    id="role"
                    aria-label="role"
                    name="isAdmin"
                    required
                >
                    <option selected>Select Role</option>
                    @if(old('isAdmin',$data->isAdmin)==$data->isAdmin)
                    <option selected value="{{ $data->isAdmin }}">
                        @if($data->isAdmin==1) Admin @else User @endif
                    </option>
                    @else
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                    @endif
                </select>
                <label for="role">Role</label>
                @error('isAdmin')
                <div id="isAdmin" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Password"
                    name="password"
                />
                <label for="password">Password</label>
                @error('password')
                <div id="password" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 col-5">
                <label for="pic" class="form-label text-blue-600">Photo</label>
                @if($data->pic)
                <img
                    width="200"
                    src="{{ asset('storage/'. $data->pic) }}"
                    class="img-fluid img-preview mb-2 d-block"
                    alt=""
                />
                <input type="hidden" name="old_pic" value="{{ $data->pic }}" />
                @else
                <img width="200" class="img-preview img-fluid mb-2" alt="" />
                @endif
                <img width="200" class="img-preview img-fluid mb-2" alt="" />
                <input
                    class="form-control form-control-sm"
                    id="pic"
                    type="file"
                    name="pic"
                    onchange="previewImage()"
                />
            </div>
            <div class="mb-3 ms-3 mt-5">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <div class="card-footer small text-muted">
        Updated yesterday at 11:59 PM
    </div>
</div>
@endsection
