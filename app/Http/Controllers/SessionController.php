<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("session.create");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($attributes)) {
            $request->session()->regenerate();

            return redirect(route("characters.index"))->with(
                "success",
                "Logged In"
            );
        }

        throw ValidationException::withMessages([
            "email" => "Your provided credentials could not be verified.",
        ]);
    }

    public function destroy(User $user)
    {
        Auth::logout();

        return redirect()
            ->route("home")
            ->with("success", "Goodbye!");
    }
}
