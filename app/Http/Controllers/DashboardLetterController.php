<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\CategoryLetters;

class DashboardLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.units.letter.index', [
            'title' => 'Letters Data Unit',
            // 'datas' => Letter::latest()
            //     ->paginate(10)
            //     ->withQueryString(),
            'data' => CategoryLetters::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(CategoryLetters $categoryletters)
    {
        return view('dashboard.units.letter.data', [
            'title' => 'Letters Data',
            'datas' => letter::where(
                'category_letters_id',
                $categoryletters->id
            )
                ->latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }
    public function create()
    {
        return view('dashboard.units.letter.create', [
            'title' => 'Add Letter',
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
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        return view('dashboard.Units.letter.show', [
            'title' => 'Detail Letter',
            'data' => $letter->load('categoryletter', 'unit')->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        return view('dashboard.unit.letter.edit', [
            'title' => 'Edit Letter',
            '$data' => $letter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        //
    }
}