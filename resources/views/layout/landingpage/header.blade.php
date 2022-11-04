<header class="bg-slate-200 p-3 shadow-sm mt-5">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md border border-1 d-flex mt-3">
                <div class="me-3">
                    @can('admin') @auth @if($data->pic != 0)
                    <img
                        class="rounded-circle border border-light shadow"
                        src="{{ asset('storage/'. $data->pic) }}"
                        width="150px"
                        alt=""
                    />@else
                    <img
                        class="rounded-circle border border-light shadow"
                        src="/img/1.jpg"
                        width="150px"
                        alt=""
                    />
                    @endif @endAuth @endcan @guest
                    <img
                        class="rounded-circle border border-light shadow"
                        src="/img/1.jpg"
                        width="150px"
                        alt=""
                    />
                    @endguest
                </div>
                <div class="border mt-4">
                    <h3 class="text-uppercase fw-bold mt-2 text-shadow">
                        @auth
                        {{ $data->fullname }}
                        @endauth @guest Guest @endguest
                    </h3>
                    @auth
                    <p class="text-slate-600 fw-semibold">
                        {{ Auth::user()->email }}<br />
                        <span class="text-muted fw-light text-14">
                            @if(Auth::user()->isAdmin==1) Administrator @else
                            User @endif
                        </span>
                    </p>
                    @endauth
                </div>
            </div>
            <div class="col-md">
                @auth
                <div class="mt-5">
                    <ul
                        class="nav-item d-flex flex-md-row justify-content-between"
                    >
                        <li class="nav-link">
                            <a
                                href="#"
                                class="me-4 fs-3 text-decoration-none d-flex flex-md-row align-items-center text-slate-500 link-secondary flex-lg-column"
                            >
                                <i class="bi bi-cloud"></i>
                                <div class="ms-4">
                                    <div class="fs-6 fw-bold text-uppercase">
                                        Cloud
                                    </div>
                                    <div class="text-12 fw-light">
                                        Description
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a
                                href="#"
                                class="me-4 fs-3 text-decoration-none d-flex flex-md-row align-items-center text-slate-500 link-secondary flex-lg-column"
                                ><i class="bi bi-person-circle"></i>
                                <div class="ms-4">
                                    <div class="fs-6 fw-bold text-uppercase">
                                        User
                                    </div>
                                    <div class="text-12 fw-light">
                                        Description
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a
                                href="#"
                                class="me-4 fs-3 text-decoration-none d-flex flex-md-row align-items-center text-slate-500 link-secondary flex-lg-column"
                                ><i class="bi bi-tools"></i>
                                <div class="ms-4">
                                    <div class="fs-6 fw-bold text-uppercase">
                                        Setting
                                    </div>
                                    <div class="text-12 fw-light">
                                        Description
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                @endAuth
            </div>
        </div>
    </div>
</header>
