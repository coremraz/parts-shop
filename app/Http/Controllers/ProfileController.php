<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

        $validator = Validator::make(request()->all(), [
            'birth_date' => ['required'],
            'sex' => ['required'],
            'inn' => ['max:255'],
            'company_name' => ['max:255'],
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        $attributes = request()->validate([
            'birth_date' => ['required'],
            'sex' => ['required'],
            'inn' => ['digits:10'],
            'company_name' => ['max:255'],
        ]);

        if (!empty($attributes['inn']) && !empty($attributes['company_name'])) {
            if (!Company::where('inn', $attributes['inn'])->exists()) {
                $company = new Company();
                $company->name = $attributes['company_name'];
                $company->inn = $attributes['inn'];
                $company->save();
            }
        }


            $attributes['delegate'] = request()->filled('delegate') ? 1 : 0;
            $user = Auth::user();
            $user->company_id = Company::where('inn', $attributes['inn'])->first()->id;
            $user->fill($attributes);
            $user->save();

            return redirect('profile');
        }
    }
