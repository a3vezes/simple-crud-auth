<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "image" => "images/template.png",
            "nationality" => $this->faker->country(),
            "fight_style" => $this->faker->company(),
            "birthdate" => $this->faker->date(),
            "user_id" => User::factory(),
        ];
    }
}
