<nav class="navbar navbar-expand-lg bg-slate-200 fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-slate-500" href="#"
            >Lazuardi<i class="bi bi-activity"></i>Code</a
        >
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @Auth
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-16 fw-semibold"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        {{ Auth::user()->name }}
                        <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button
                                    type="submit"
                                    class="dropdown-item text-blue-700"
                                >
                                    <i class="bi bi-box-arrow-left"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a
                        class="nav-link {{ Request::is('/login*') ? 'active' : '' }} text-uppercase text-blue-200 font-semibold fs-14"
                        href="/login"
                        ><i class="bi bi-arrow-bar-left"></i> Login</a
                    >
                </li>
                @endAuth
            </ul>
        </div>
    </div>
</nav>
