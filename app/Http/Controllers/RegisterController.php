<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()  {
        return view('register.create');
    }

    public function store()  {
        $attributes = request()->validate([
            'name'=> 'required',
            'username'=> 'required|unique:users,username',
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with("success", 'Account created');
    }
}
