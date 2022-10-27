@extends('layout.login') @section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3
                    class="text-center font-weight-light my-4 fc-blue text-uppercase"
                >
                    Login
                </h3>
            </div>
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
            @endif
            <div class="card-body">
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-floating mb-3">
                        <input
                            class="form-control @error('username') is-invalid @enderror"
                            id="inputUsername"
                            type="text"
                            placeholder="username"
                            name="username"
                        />
                        <label for="inputUsername">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            class="form-control @error('password') is-invalid @enderror"
                            id="inputPassword"
                            type="password"
                            placeholder="Password"
                            name="password"
                        />
                        <label for="inputPassword">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div
                        class="d-flex align-items-center justify-content-center mt-4 mb-0"
                    >
                        <button type="submit" class="btn btn-primary">
                            LOGIN
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small">
                    <span class="fw-bold fc-blue"
                        >LAZUARDI<i class="bi bi-activity"></i>CODE</span
                    >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
