@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Form Add User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/user">User Management</a>
    </li>
    <li class="breadcrumb-item active">Form Add User</li>
</ol>
<div class="card mb-4 col-md-7">
    <div class="card-header">
        <i class="fas fa-user-plus"></i>
        Create New User
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    id="floatingInput"
                    placeholder="username"
                    name="username"
                />
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name"
                    name="name"
                />
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name@example.com"
                    name="email"
                />
                <label for="floatingInput">Email address</label>
            </div>
        </form>
    </div>
    <div class="card-footer small text-muted">
        Updated yesterday at 11:59 PM
    </div>
</div>
@endsection
