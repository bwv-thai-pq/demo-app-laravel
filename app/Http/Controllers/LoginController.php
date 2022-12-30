<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pwd' =>'required',
        ]);

        $name = $request->input('name');
        $pwd = $request->input('pwd');
        if ($name === 'admin' && $pwd === 'admin') {
            session(['user' => 'admin']);
            return redirect()->route('home');
        }
        return redirect()->back()->withInput()->with('error', 'Username or password is incorrect');

    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }
}
