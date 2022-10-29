@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Form Add User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/user">User Management</a>
    </li>
    <li class="breadcrumb-item active">Form Add User</li>
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
        <i class="fas fa-user-plus"></i>
        Create New User
    </div>
    <div class="card-body">
        <form
            action="/dashboard/user"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('username') is-invalid @enderror"
                    id="floatingInput"
                    placeholder="username"
                    name="username"
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
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="floatingInput"
                    placeholder="name@example.com"
                    name="email"
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

                    <option value="1">Admin</option>
                    <option value="0">User</option>
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
                    required
                />
                <label for="password">Password</label>
                @error('password')
                <div id="password" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 ms-3 mt-5">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <div class="card-footer small text-muted">
        Updated yesterday at 11:59 PM
    </div>
</div>
@endsection
