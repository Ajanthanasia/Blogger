<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\VerifyUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.accounts.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.accounts.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VerifyUserRequest $request)
    {
        $validated = $request->validated();
        $user = new User;
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->role = 'user';
        $user->password = Hash::make($request->get('password'));
        $user->remember_token = Str::random(10);
        $user->save();
        return redirect('/')->with('status', 'User Account is registered successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LoginRequest $request)
    {
        $validated = $request->validated();
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            if(Auth::User()->role == 'user') {
                return redirect()->route('home.index');
            }
            else if(Auth::User()->role == 'admin') {
                return redirect()->route('home.index');
            }
            else {
                return back()->with('status','Wrong User Type.!');
            }
        }
        else {
            return back()->with([
                'status' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
