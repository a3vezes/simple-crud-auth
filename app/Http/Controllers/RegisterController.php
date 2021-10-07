<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view("register.create");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "name" => "required",
            "email" => "required|email:rfc,dns|unique:users,email",
            "password" => "required|min:0",
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect(route("characters.index"))->with(
            "success",
            "Logged In"
        );
    }

    public function destroy(User $user)
    {
        //
    }
}
