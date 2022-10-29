@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">User Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">User Management</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <p class="mb-0">Data user Management</p>
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

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data List User
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <a
                    href="/dashboard/user/create"
                    class="btn btn-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add New User"
                >
                    <i class="fas fa-plus-circle"></i> Add
                </a>
            </div>
            <div class="col-sm-4 ms-2">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search"
                        aria-label="search"
                        aria-describedby="button-addon2"
                    />
                    <button
                        class="btn btn-outline-primary"
                        type="button"
                        id="button-addon2"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>
        <table id="table" class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if($users->count()) @foreach($users as $user)

                <tr>
                    <th scope="row">
                        {{ ($users->currentpage()-1) * $users->perpage() + $loop->index + 1 }}
                    </th>

                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->isAdmin == 1)
                        {{ $role = 'Administrator' }} @else
                        {{$role =
                        'user'}}
                        @endif
                    </td>
                    <td>
                        <a
                            href="/dashboard/user/{{ $user->username }}"
                            class="badge bg-success"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Detail User"
                            ><i class="bi bi-eye"></i
                        ></a>
                        <a
                            href="/dashboard/user/{{ $user->username }}/edit"
                            class="badge bg-warning"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit User"
                            ><i class="bi bi-pencil-square"></i
                        ></a>

                        <form
                            action="/dashboard/user/{{ $user->username }}"
                            method="post"
                            class="d-inline"
                        >
                            @method('delete') @csrf
                            <button
                                class="badge bg-danger"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Delete User"
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
