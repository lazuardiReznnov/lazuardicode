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
        if (auth()->guest()) {
            $data = '';
        } else {
            $data = profilUser::where('user_id', auth::user()->id)->first();
        }

        return view('landingpage.index', [
            'title' => 'Landing Page',
            'data' => $data,
        ]);
    }
}
