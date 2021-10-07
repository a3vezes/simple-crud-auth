<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "nationality",
        "fight_style",
        "birthdate",
        "slug",
        "user_id",
    ];
}
