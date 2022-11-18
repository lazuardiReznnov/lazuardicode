@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Profile</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">User Management</li>
    <li class="breadcrumb-item active">Profile</li>
</ol>

<!-- pesan -->
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
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
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Profile
    </div>
    <div class="card-body">
        <form
            action="/dashboard/users/profilUser/{{ $data->slug }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf @method('put')
            <div class="row mb-3">
                <div class="col-md">
                    <label for="img" class="form-label fw-bold">Photo</label>
                    @if($data->pic)
                    <img
                        width="200"
                        src="{{ asset('storage/'. $data->pic) }}"
                        class="img-preview img-fluid mb-2 d-block"
                        alt="about Image"
                    />
                    <input
                        type="hidden"
                        name="old_pic"
                        value="{{ $data->pic }}"
                    />
                    @else
                    <img
                        width="200"
                        class="img-preview img-fluid mb-2"
                        alt=""
                    />
                    @endif
                </div>
                <div class="col-md">
                    <input
                        class="form-control form-control-sm @error('pic') is_invalid @enderror"
                        id="pic"
                        type="file"
                        name="pic"
                        onchange="previewImage()"
                    />
                    @error('pic')
                    <div id="pic" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <hr />
            <div class="row mb-3">
                <div class="col-md">
                    <label for="fullname" class="form-label fw-bold"
                        >Full Name</label
                    >
                    <h4>{!! $data->fullname !!}</h4>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('fullname') is-invalid @enderror"
                        id="fullname"
                        name="fullname"
                        value="{{ old('fullname',$data->fullname) }}"
                    />
                    @error('fullname')
                    <div id="fullname" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-md">
                    <label for="smalltitle" class="form-label fw-bold"
                        >Small Title</label
                    >
                    <p>{!! $data->smalltitle !!}</p>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('smalltitle') is-invalid @enderror"
                        id="smalltitle"
                        name="smalltitle"
                        value="{{ old('smalltitle',$data->smalltitle) }}"
                    />
                    @error('smallTitle')
                    <div id="smallTitle" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-md">
                    <label for="job" class="form-label fw-bold">Job</label>
                    <p>{!! $data->job !!}</p>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('job') is-invalid @enderror"
                        id="job"
                        name="job"
                        value="{{ old('job',$data->job) }}"
                    />
                    @error('job')
                    <div id="job" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-3 justify-content-between">
                <div class="col-md-5">
                    <label for="descriptions" class="form-label fw-bold"
                        >description</label
                    >
                    <p>{!! $data->descriptions !!}</p>
                </div>
                <div class="col-md-6">
                    <input
                        id="descriptions"
                        type="hidden"
                        name="descriptions"
                    />
                    <trix-editor
                        input="descriptions"
                        >{{ $data->descriptions }}</trix-editor
                    >
                    @error('descriptions')
                    <div id="descriptions" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-md">
                    <label for="fb" class="form-label fw-bold"
                        >Facebook Link</label
                    >
                    <p>
                        <a
                            href="{{ $data->facebook }}"
                            class="badge text-decoration-none text-primary fs-3"
                            ><i class="fab fa-facebook"></i
                        ></a>
                    </p>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('facebook') is-invalid @enderror"
                        id="facebook"
                        name="facebook"
                        value="{{ old('facebook',$data->facebook) }}"
                    />
                    @error('facebook')
                    <div id="facebook" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-md">
                    <label for="ln" class="form-label fw-bold"
                        >Linkedin Link</label
                    >
                    <p>
                        <a
                            href="{{ $data->linkedin }}"
                            class="badge text-primary fs-3 text-decoration-none"
                            ><i class="bi bi-linkedin"></i
                        ></a>
                    </p>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('linkedin') is-invalid @enderror"
                        id="linkedin"
                        name="linkedin"
                        value="{{ old('linkedin',$data->linkedin) }}"
                    />
                    @error('linkedin')
                    <div id="linkedin" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-md">
                    <label for="ins" class="form-label fw-bold"
                        >Instagram Link</label
                    >
                    <p>
                        <a
                            href="{{ $data->instagram }}"
                            class="badge text-danger fs-3 text-decoration-none"
                            ><i class="bi bi-instagram"></i
                        ></a>
                    </p>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('instagram') is-invalid @enderror"
                        id="instagram"
                        name="instagram"
                        value="{{ old('instagram',$data->instagram) }}"
                    />
                    @error('instagram')
                    <div id="instagram" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="row mb-5">
                <div class="col-md">
                    <label for="ins" class="form-label fw-bold"
                        >github Link</label
                    >
                    <p>
                        <a
                            href="{{ $data->github }}"
                            class="badge text-dark fs-3 text-decoration-none"
                            ><i class="bi bi-github"></i
                        ></a>
                    </p>
                </div>
                <div class="col-md">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('github') is-invalid @enderror"
                        id="github"
                        name="github"
                        value="{{ old('github',$data->github) }}"
                    />
                    @error('github')
                    <div id="github" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <hr />
                <div class="row mb-5">
                    <div class="col-md">
                        <button
                            class="btn btn-primary"
                            type="submit"
                            name="save"
                        >
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card col-md-6">
    <div class="card-header">Change Password</div>
    <div class="card-body">
        <form
            action="/dashboard/user/changepassword{{ $data->username }}"
            method="post"
            enctype="multipart/form-data"
        >
            @method('put') @csrf
            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="old_password"
                    placeholder="Old Password"
                    name="old_password"
                />
                <label for="password">Old Password</label>
                @error('old_password')
                <div id="password" class="invalid-feedback">
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

            <div class="mb-3 ms-3 mt-5">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
