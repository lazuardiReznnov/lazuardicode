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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
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