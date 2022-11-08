@extends('layout.dashboard.main') @section('content')
<h1 class="mt-4">Form Input Unit</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item">
        <a href="/dashboard/units">Unit Management</a>
    </li>
    <li class="breadcrumb-item active">Form Input Unit</li>
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
                    action="/dashboard/units"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="reg Number"
                            name="name"
                        />
                        <label for="floatingInput">Reg Number</label>
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
                            placeholder="reg Number"
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
                            class="form-select @error('category_id') is-invalid @enderror"
                            id="category"
                            aria-label="Floating label select example"
                            name="category_id"
                        >
                            <option selected>Select Category</option>
                            @foreach($categories as $category)
                            @if(old('category_id')==$category->id)
                            <option value="{{ $category->id }}" selected>
                                {{ $category->name }}
                            </option>
                            @endif
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Category</label>
                        @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select
                            class="form-select @error('brand') is-invalid @enderror"
                            id="brand"
                            aria-label="Floating label select example"
                            name="brand"
                        >
                            <option selected>Select Brand</option>
                            @foreach($brands as $brand)
                            @if(old('brand')==$brand->id)
                            <option value="{{ $brand->id }}" selected>
                                {{ $brand->name }}
                            </option>
                            @endif
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Brand</label>
                        @error('brand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select
                            class="form-select"
                            aria-label="Default select example"
                            id="type"
                            name="type_id"
                        ></select>
                        <label for="floatingSelect">Type</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select
                            class="form-select @error('bak_id') is-invalid @enderror"
                            id="bak"
                            aria-label="Floating label select example"
                            name="bak_id"
                        >
                            <option selected>Select bak</option>
                            @foreach($baks as $bak) @if(old('bak_id')==$bak->id)
                            <option value="{{ $bak->id }}" selected>
                                {{ $bak->name }}
                            </option>
                            @endif
                            <option value="{{ $bak->id }}">
                                {{ $bak->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">baks</label>
                        @error('bak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select
                            class="form-select @error('flag_id') is-invalid @enderror"
                            id="flag"
                            aria-label="Floating label select example"
                            name="flag_id"
                        >
                            <option selected>Select flag</option>
                            @foreach($flags as $flag)
                            @if(old('flag_id')==$flag->id)
                            <option value="{{ $flag->id }}" selected>
                                {{ $flag->name }}
                            </option>
                            @endif
                            <option value="{{ $flag->id }}">
                                {{ $flag->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Flags</label>
                        @error('flag')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select
                            class="form-select @error('group') is-invalid @enderror"
                            id="group"
                            aria-label="Floating label select example"
                            name="group_id"
                        >
                            <option selected>Select groups</option>
                            @foreach($groups as $group)
                            @if(old('group_id')==$group->id)
                            <option value="{{ $group->id }}" selected>
                                {{ $group->name }}
                            </option>
                            @endif
                            <option value="{{ $group->id }}">
                                {{ $group->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Groups</label>
                        @error('group')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('color') is-invalid @enderror"
                            id="color"
                            placeholder="Colours"
                            name="color"
                        />
                        <label for="floatingInput">Colours</label>
                        @error('color')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('vin') is-invalid @enderror"
                            id="vin"
                            placeholder="vin"
                            name="vin"
                        />
                        <label for="floatingInput">Vin</label>
                        @error('vin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control @error('engine_numb') is-invalid @enderror"
                            id="engine_numb"
                            placeholder="engine Number"
                            name="engine_numb"
                        />
                        <label for="floatingInput">Engine Number</label>
                        @error('engine_numb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-floating col-md-3">
                        @php $now = date('Y'); @endphp
                        <select name="year" class="form-select">
                            <option selected>--Choice Year--</option>
                            @for ($a=2012;$a<=$now;$a++)
                            <option value="{{ $a }}">{{ $a }}</option>
                            @endfor
                        </select>
                        <label for="year" class="form-label">Year</label>
                        @error('year')
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
    const link = "/dashboard/unit/checkSlug?name=";

    makeslug(name, slug, link);

    const brand = document.querySelector("#brand");
    const category = document.querySelector("#category");
    const type = document.querySelector("#type");
    const link2 = "/dashboard/unit/getType?brand=";

    makeBrand(brand, type, link2);
</script>
@endsection
