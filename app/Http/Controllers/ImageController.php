<?php

namespace App\Http\Controllers;

use App\Traits\HasFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    use HasFiles;
    const USER_DIRECTORY = 'users';

    public function create()
    {
        $userImage = auth()->user()->images()->latest()->first();

        return view('images.create',compact('userImage'));
    }

    public function store(Request $request)
    {
        $userEmail = Str::beforeLast(auth()->user()->email,'.');
        $path = $this->storeBase64(self::USER_DIRECTORY,$request->base64_image,$userEmail);

        auth()->user()->images()->create(['path' => $path]);

        return ['message' => 'done','redirect' => route('count-down')];
    }
}
