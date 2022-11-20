@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">{{ $title }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/unit/fileUnit">Files Unit Management</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>
<div class="card mb-4 col-md-8">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Files
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm ms-2 mb-4">
                <form
                    action="/dashboard/unit/fileUnit/{{ $data->slug }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="File Name"
                            name="name"
                            value="{{ old('name',$data->name) }}"
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
                            value="{{ old('slug', $data->slug) }}"
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
                            @foreach($data_unit as $unit)
                            @if(old('unit_id',$data->unit_id)==$unit->id)
                            <option value="{{ $unit->id }}" selected>
                                {{ $unit->name }}
                            </option>
                            @lelse
                            <option value="{{ $unit->id }}">
                                {{ $unit->name }}
                            </option>
                            @endif @endforeach
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
                            >{{ old("description",$data->description) }}</textarea
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
                        @if($data->pic)
                        <input
                            type="hidden"
                            name="old_pic"
                            value="{{ $data->pic }}"
                        />
                        <img
                            src="{{ asset('storage/'. $data->pic) }}"
                            class="d-block img-preview img-fluid mb-2 col-sm-5"
                        />
                        @else
                        <img class="img-preview img-fluid mb-2 col-sm-5" />
                        @endif

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
