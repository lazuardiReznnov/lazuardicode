<div class="col-lg-2 p-2 card-hover border border-1 me-2 shadow-sm">
    <a
        href="{{ $link }}"
        class="d-flex flex-row text-decoration-none text-slate-500"
    >
        <div class="fs-3 me-4">
            {{ $slot }}
        </div>
        <div>
            <h4 class="text-16 fw-bold text-uppercase">{{ $title }}</h4>
            <p class="text-12">{{ $description }}</p>
        </div>
    </a>
</div>
