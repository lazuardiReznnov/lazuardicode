<header class="bg-slate-200 p-3 shadow-sm mt-5">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md border border-1 d-flex mt-3">
                <div class="me-3">
                    <img
                        class="rounded-circle border border-light shadow"
                        src="/img/1.jpg"
                        width="150px"
                        alt=""
                    />
                </div>
                <div class="border mt-4">
                    <h3 class="text-uppercase fw-bold mt-2 text-shadow">
                        @Auth @if(Route::has('login'))
                        {{ Auth::user()->name }}
                        @else @endif @endAuth @guest guest @endguest
                    </h3>
                    <p class="text-slate-600 fw-semibold">
                        lazuardi.reznnov@gmail.com<br />
                        <span class="text-muted fw-light text-14"
                            >Administrator</span
                        >
                    </p>
                </div>
            </div>
            <div class="col-md">
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
            </div>
        </div>
    </div>
</header>
