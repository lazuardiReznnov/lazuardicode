<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UnitImport;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Group;
use App\Models\Flag;
use App\Models\Bak;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;

class DashboardUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.units.unit.index', [
            'title' => 'Management Unit',
            'datas' => Unit::latest()
                ->paginate(5)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.units.unit.create', [
            'title' => 'Add New User',
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'baks' => Bak::all(),
            'flags' => Flag::all(),
            'groups' => Group::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_id' => 'required',
            'bak_id' => 'required',
            'flag_id' => 'required',
            'group_id' => 'required',
            'name' => 'required|max:20|unique:units',
            'slug' => 'required|unique:units',
            'color' => 'required',
            'vin' => 'required',
            'engine_numb' => 'required',
            'year' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request->file('pic')->store('unit-pic');
        }

        Unit::create($validatedData);

        return redirect('/dashboard/units')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('dashboard.units.unit.show', [
            'title' => 'Detail Unit',
            'data' => $unit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('dashboard.units.unit.edit', [
            'title' => 'Edit Unit',
            'unit' => $unit,
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'baks' => Bak::all(),
            'flags' => Flag::all(),
            'groups' => Group::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $rules = [
            'type_id' => 'required',
            'bak_id' => 'required',
            'flag_id' => 'required',
            'group_id' => 'required',
            'color' => 'required',
            'vin' => 'required',
            'engine_numb' => 'required',
            'year' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->name != $unit->name) {
            $rules['name'] = 'required|unique:units|max:25';
        }
        if ($request->slug != $unit->slug) {
            $rules['slug'] = 'required|unique:units';
        }
        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('unit-pic');
        }

        Unit::where('id', $unit->id)->update($validatedData);

        return redirect('/dashboard/units')->with(
            'success',
            'Unit Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        Unit::destroy($unit->id);
        if ($unit->pic) {
            storage::delete($unit->pic);
        }
        return redirect('/dashboard/units')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function fileImportCreate()
    {
        return view('dashboard.units.unit.file-import-create', [
            'title' => 'Import User',
        ]);
    }

    public function fileImport(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new UnitImport(), $validatedData['excl']);
            return redirect('/dashboard/units')->with(
                'success',
                'New Units Has Been Aded.!'
            );
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Unit::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function gettype(Request $request)
    {
        $type = Type::where([
            ['brand_id', $request->brand],
            ['category_id', $request->category],
        ])->get();
        return response()->json($type);
    }
}