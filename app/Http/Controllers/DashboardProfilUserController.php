<?php

namespace App\Http\Controllers;

use App\Models\ProfilUser;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;

class DashboardProfilUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.profile.index', [
            'title' => 'Profil User',
            'data' => ProfilUser::where('user_id', Auth::user()->id)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\ProfilUser  $profilUser
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilUser $profilUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilUser  $profilUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilUser $profilUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilUser  $profilUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilUser $profilUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilUser  $profilUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilUser $profilUser)
    {
        //
    }
}