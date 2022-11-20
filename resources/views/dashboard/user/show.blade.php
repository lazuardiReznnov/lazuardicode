@extends('layout.dashboard.main') @section('content')

<h1 class="mt-4">{{ $title }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/user">User Management</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<div class="card col-md-8">
    <div class="card-header">Acount Detail</div>
    <div class="card-body">
        <div class="accordion accordion-flush" id="acountuser">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne"
                        aria-expanded="false"
                        aria-controls="flush-collapseOne"
                    >
                        User Account
                    </button>
                </h2>
                <div
                    id="flush-collapseOne"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne"
                    data-bs-parent="#acountuser"
                >
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Username</b><br />
                                {{ $data->username }}
                            </li>
                            <li class="list-group-item">
                                <b>Email</b><br />
                                {{ $data->email }}
                            </li>
                            <li class="list-group-item">
                                <b>Roles</b><br />

                                {{ $data->isAdmin = 1 ? 'Admin' : 'user' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo"
                        aria-expanded="false"
                        aria-controls="flush-collapseTwo"
                    >
                        Profil User
                    </button>
                </h2>
                <div
                    id="flush-collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-bs-parent="#acountuser"
                >
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b> Picture </b><br />

                                @if($data->profil_user->pic != '')
                                <img
                                    width="200"
                                    src="{{ asset('storage/'. $data->profil_user->pic) }}"
                                    class="irounded-circle d-block shadow my-3"
                                    alt="about Image"
                                />
                                @else
                                <img
                                    class="rounded-circle d-block shadow my-3"
                                    src="http://source.unsplash.com/200x200?truck"
                                    alt=""
                                    width="50"
                                />
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Full Name</b><br />
                                {{ $data->profil_user->fullname }}
                            </li>
                            <li class="list-group-item">
                                <b>Job</b><br />
                                {{ $data->profil_user->job }}
                            </li>
                            <li class="list-group-item">
                                <b>Quote</b><br />
                                {{ $data->profil_user->smalltitle }}
                            </li>
                            <li class="list-group-item">
                                <b>Description</b><br />
                                {{ $data->profil_user->descriptions }}
                            </li>
                            <li class="list-group-item">
                                <b>Social Media</b><br />
                                <p>
                                    <a
                                        href="{{ $data->profil_user->facebook }}"
                                        class="badge text-decoration-none text-primary fs-3"
                                        ><i class="fab fa-facebook"></i
                                    ></a>
                                    <a
                                        href="{{ $data->profil_user->linkedin }}"
                                        class="badge text-primary fs-3 text-decoration-none"
                                        ><i class="bi bi-linkedin"></i
                                    ></a>
                                    <a
                                        href="{{ $data->profil_user->instagram }}"
                                        class="badge text-danger fs-3 text-decoration-none"
                                        ><i class="bi bi-instagram"></i
                                    ></a>
                                    <a
                                        href="{{ $data->profil_user->github }}"
                                        class="badge text-dark fs-3 text-decoration-none"
                                        ><i class="bi bi-github"></i
                                    ></a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
