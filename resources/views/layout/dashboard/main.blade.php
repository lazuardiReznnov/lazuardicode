<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }} | LAZUARDICODE</title>
        <link
            href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"
            rel="stylesheet"
        />
        <link href="/css/styles.css" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="/css/trix.css" />

        <script src="/js/lazuardicode.js"></script>
        <script src="/js/trix.js"></script>
    </head>
    <body class="sb-nav-fixed">
        @include('layout.dashboard.nav-bar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">@include('layout.dashboard.aside')</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">@yield('content')</div>
                </main>
                @include('layout.dashboard.footer')
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
        ></script>
        <script src="/js/scripts.js"></script>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
