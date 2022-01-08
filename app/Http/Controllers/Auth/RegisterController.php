<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Aspiration;
use App\Models\Country;
use App\Models\Therapy;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $aspirations = Aspiration::query()->where('name','!=','Others')->get();
        $countries   = Country::all();
        $therapies   = Therapy::all();

        return view('auth.register', compact('aspirations', 'countries','therapies'));
    }

    public function register(RegisterRequest $registerRequest)
    {
        $user =User::query()
            ->firstOrCreate($registerRequest->only('email'),
                            $registerRequest->only('email', 'name', 'country_id', 'aspiration_id','therapy_id') +
                            ['ip' => $registerRequest->ip()]);

        auth()->login($user);


        if ($user->images()->exists())
            return redirect('count-down');

        return redirect(route('images.create'));
    }
}
