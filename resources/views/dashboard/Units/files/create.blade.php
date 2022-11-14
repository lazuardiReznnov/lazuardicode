@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/files">Files Unit Management</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>
<div class="card mb-4 col-md-8">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Add Unit
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <form
                    action="/dashboard/unit/files"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="File Name"
                            name="name"
                        />
                        <label for="floatingInput">File Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('slug') is-invalid @enderror"
                            id="slug"
                            placeholder="slug"
                            name="slug"
                            readonly
                        />
                        <label for="floatingInput">Slug</label>
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select
                            class="form-select @error('unit_id') is-invalid @enderror"
                            id="unit_id"
                            aria-label="Floating label select example"
                            name="unit_id"
                        >
                            <option selected>Select unit</option>
                            @foreach($data as $unit)
                            @if(old('unit_id')==$unit->id)
                            <option value="{{ $unit->id }}" selected>
                                {{ $unit->name }}
                            </option>
                            @endif
                            <option value="{{ $unit->id }}">
                                {{ $unit->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">unit</label>
                        @error('unit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="description"
                            id="description"
                            style="height: 100px"
                            name="description"
                            >{{ old("description") }}</textarea
                        >
                        <label for="description">description</label>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"
                            >Upload Image</label
                        >
                        <img
                            width="200"
                            class="img-preview img-fluid mb-2"
                            alt=""
                        />
                        <input
                            class="form-control @error('pic') is-invalid @enderror"
                            type="file"
                            id="pic"
                            name="pic"
                            onchange="previewImage()"
                        />
                        @error('pic')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // slug post
    //  slug alternatif`
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    const link = "/dashboard/unit/files/cekSlug?name=";

    makeslug(name, slug, link);
</script>
@endsection
