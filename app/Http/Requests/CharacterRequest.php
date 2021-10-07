<?php

namespace App\Http\Requests;

use App\Models\Character;
use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "between:6,255"],
            "image" => ["image"],
            "nationality" => ["required", "string", "between:3,255"],
            "fight_style" => ["required", "string", "between:3,255"],
            "birthdate" => ["required", "date"],
        ];
    }
}
