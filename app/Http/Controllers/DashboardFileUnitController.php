<?php

namespace App\Http\Controllers;

use App\Models\FileUnit;
use Illuminate\Http\Request;
use App\Models\Unit;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardFileUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.units.files.index', [
            'title' => 'Files Unit data',
            'datas' => FileUnit::latest()
                ->paginate(10)
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
        return view('dashboard.units.files.create', [
            'title' => 'Add Files',
            'data' => Unit::all(),
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
     * @param  \App\Models\FileUnit  $fileUnit
     * @return \Illuminate\Http\Response
     */
    public function show(FileUnit $fileUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUnit  $fileUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUnit $fileUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileUnit  $fileUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileUnit $fileUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUnit  $fileUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileUnit $fileUnit)
    {
        //
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            FileUnit::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }
}