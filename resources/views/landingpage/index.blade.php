<x-app title="{{ $title }}">
    <!-- searchbar -->
    <div class="row mt-3 p-3 justify-content-center">
        <div class="col-md-6">
            <form action="">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="search"
                        aria-label="search"
                        aria-describedby="search"
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="submit"
                        id="search"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Endsearchbar -->
    <div class="row justify-content-between g-2">
        <x-dashboardcard link="#">
            <i class="bi bi-map"></i>
            <x-slot name="title">Rute</x-slot>
            <x-slot name="description"> Description</x-slot>
        </x-dashboardcard>

        <x-dashboardcard link="#" title="Unit" description="Description">
            <i class="bi bi-truck"></i>
        </x-dashboardcard>

        <x-dashboardcard link="#" title="Report" description="Description">
            <i class="bi bi-file-earmark-excel"></i>
        </x-dashboardcard>

        <x-dashboardcard link="#" title="Sparepart" description="Description">
            <i class="bi bi-gear"></i>
        </x-dashboardcard>

        <x-dashboardcard link="#" title="Employee" description="Description">
            <i class="bi bi-person-rolodex"></i>
        </x-dashboardcard>
    </div>
</x-app>
