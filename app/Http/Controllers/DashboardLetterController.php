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
            'datas' => $categoryletters
                ->letter()
                ->latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }
    public function create()
    {
        return view('dashboard.units.letter.create', [
            'title' => 'Add Letter',
            'data_category_letters' => CategoryLetters::All(),
            'data_unit' => Unit::all(),
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
        $validateData = $request->validate([
            'unit_id' => 'required',
            'category_letters_id' => 'required',
            'regNum' => 'required',
            'owner' => 'required',
            'owner_add' => 'required',
            'reg_year' => 'required',
            'loc_code' => 'required',
            'lpc' => 'required',
            'vodn' => 'required',
            'tax' => 'required',
            'expire_date' => 'required',
        ]);

        Letter::create($validateData);

        return redirect('/dashboard/unit/letter')->with(
            'success',
            'New Unit Has Been aded.'
        );
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
            'data' => $letter,
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
        return view('dashboard.units.letter.edit', [
            'title' => 'Edit Letter',
            'data' => $letter,
            'data_category_letters' => CategoryLetters::All(),
            'data_unit' => Unit::all(),
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
        $rules = [
            'unit_id' => 'required',
            'category_letters_id' => 'required',
            'owner' => 'required',
            'owner_add' => 'required',
            'reg_year' => 'required',
            'loc_code' => 'required',
            'lpc' => 'required',
            'vodn' => 'required',
            'tax' => 'required',
            'expire_date' => 'required',
        ];
        if ($request->regNum != $letter->regNum) {
            $rules['regNum'] = 'required|unique:letters|max:25';
        }
        $validatedData = $request->validate($rules);
        Letter::where('id', $letter->id)->update($validatedData);

        return redirect(
            '/dashboard/unit/letter/data/' . $letter->categoryLetters->slug
        )->with('success', 'letter Has Been Updated.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        Letter::destroy($letter->id);

        return redirect(
            '/dashboard/unit/letter/data/' . $letter->categoryLetters->slug
        )->with('success', 'New Post Has Been Deleted.');
    }
}
