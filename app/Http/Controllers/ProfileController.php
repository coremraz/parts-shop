<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function completeProfile()
    {
        return view('auth.complete-profile');
    }

        public function store()
        {
            $attributes = request()->validate([
                'birth_date' => ['required'],
                'sex' => ['required'],
                'delegate' => ['required'],
            ]);
            $attributes['delegate'] = request()->filled('delegate') ? 1 : 0;
            $user = Auth::user();
            $user->fill($attributes);
            $user->save();

            return redirect('profile');
        }
}
