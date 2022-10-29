<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\Storage;

use function PHPSTORM_META\map;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'User Management',
            'users' => User::latest()
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
        return view('dashboard.user.create', [
            'title' => 'Add New User',
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
            'username' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email:dns',
            'isAdmin' => 'required',
            'pic' => 'image|file|max:1024',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request->file('pic')->store('user-image');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('dashboard/user')->with(
            'success',
            'User Has Been Registrated'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User',
            'data' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email:dns',
            'isAdmin' => 'required',
            'pic' => 'image|file|max:1024',
        ];
        if ($request->password != 0) {
            $rules['password'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('user-image');
        }

        if ($request->password) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        user::where('id', $user->id)->update($validatedData);

        return redirect('dashboard/user')->with(
            'success',
            'User Has Been Updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        if ($user->pic) {
            storage::delete($user->pic);
        }
        return redirect('dashboard/user')->with(
            'success',
            'User Has Been Delete'
        );
    }
}
