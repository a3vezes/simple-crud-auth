<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view("character.index", [
            "characters" => Character::where(
                "user_id",
                auth()->user()->id
            )->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("character.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        $attributes = $request->validated();

        Character::create(
            array_merge($attributes, [
                "slug" => Str::slug($attributes["name"]),
                "user_id" => auth()->user()->id,
                "image" => $request->file("image")
                    ? $request->file("image")->store("images")
                    : "/images/template.png",
            ])
        );

        return redirect()
            ->back()
            ->with("success", "Character Created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Character $character)
    {
        return view("character.edit", [
            "character" => $character,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     */
    public function update(CharacterRequest $request, Character $character)
    {
        $attributes = $request->validated();

        if ($attributes["image"] ?? false) {
            $attributes["image"] = $request->file("image")->store("images");
        }

        $character->update($attributes);

        return back()->with("success", "Character Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return redirect(route("characters.index"))->with(
            "success",
            "Character Deleted!"
        );
    }
}
