<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule as ValidationRule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', ValidationRule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);
        auth()->login($user);
        session()->flash('success', 'Registered with success..');   // return redirect('/')->with('register success', 'Registered with success..')
        return redirect('/');
    }
}
