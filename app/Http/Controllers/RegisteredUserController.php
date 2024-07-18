<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'fio' => ['required', 'string', 'max:255'],
            'number' => ['required', "regex:/^(\+7|7|8)?[\s\-]?\(?\d{3}\)?[\s\-]?\d{1}[\s\-]?\d{3}[\s\-]?\d{2}[\s\-]?\d{2}$/"],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::create($attributes);

        // Отправка события Registered
        event(new Registered($user));

         Auth::login($user);

        return redirect('/email/verify');
    }
}
