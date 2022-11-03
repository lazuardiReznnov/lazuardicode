<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ProfilUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('landingpage.index', [
            'title' => 'Landing Page',
            'data' => profilUser::where('user_id', Auth::user()->id)->first(),
        ]);
    }
}
