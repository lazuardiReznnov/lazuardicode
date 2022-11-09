<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="/dashboard">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
            </a>
            @can('admin')
            <div class="sb-sidenav-menu-heading">Administrator</div>
            <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts"
                aria-expanded="false"
                aria-controls="collapseLayouts"
            >
                <div class="sb-nav-link-icon">
                    <i class="fas fa-cog"></i>
                </div>
                Setting
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div
                class="collapse"
                id="collapseLayouts"
                aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion"
            >
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/dashboard/user"
                        >User Management</a
                    >
                    <a class="nav-link" href="/dashboard/users/profilUser"
                        >Profil Management</a
                    >
                </nav>
            </div>
            @endcan

            <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapseblog"
                aria-expanded="false"
                aria-controls="collapseblog"
            >
                <div class="sb-nav-link-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                Blog
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div
                class="collapse"
                id="collapseblog"
                aria-labelledby="headingTwo"
                data-bs-parent="#sidenavAccordion"
            >
                <nav
                    class="sb-sidenav-menu-nested nav accordion"
                    id="sidenavAccordionPages"
                >
                    <a
                        class="nav-link collapsed"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseblog"
                        aria-expanded="false"
                        aria-controls="pagesCollapseblog"
                    >
                        Authentication
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="pagesCollapseblog"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html"
                                >Register</a
                            >
                            <a class="nav-link" href="password.html"
                                >Forgot Password</a
                            >
                        </nav>
                    </div>
                    <a
                        class="nav-link collapsed"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError"
                        aria-expanded="false"
                        aria-controls="pagesCollapseError"
                    >
                        Error
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="pagesCollapseError"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div>
            <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapseUnit"
                aria-expanded="false"
                aria-controls="collapseUnit"
            >
                <div class="sb-nav-link-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                Unit Management
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div
                class="collapse"
                id="collapseUnit"
                aria-labelledby="headingTwo"
                data-bs-parent="#sidenavAccordion"
            >
                <nav
                    class="sb-sidenav-menu-nested nav accordion"
                    id="sidenavAccordionPages"
                >
                    <a
                        class="nav-link collapsed"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseUnit"
                        aria-expanded="false"
                        aria-controls="pagesCollapseUnit"
                    >
                        Unit
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="pagesCollapseUnit"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Categories</a>
                            <a class="nav-link" href="register.html">Brand</a>
                            <a class="nav-link" href="password.html"
                                >Karoseri</a
                            >
                            <a class="nav-link" href="password.html">Types</a>
                            <a class="nav-link" href="/dashboard/units">Unit</a>
                        </nav>
                    </div>
                    <a
                        class="nav-link collapsed"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseSurat"
                        aria-expanded="false"
                        aria-controls="pagesCollapseSurat"
                    >
                        Letters
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div
                        class="collapse"
                        id="pagesCollapseSurat"
                        aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages"
                    >
                        <nav class="sb-sidenav-menu-nested nav">
                            <a
                                class="nav-link"
                                href="{{ route('letter.index') }}"
                                >Letter</a
                            >
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::User()->username }}
    </div>
</nav>
