<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'  => $this->factoryForModel(User::class),
            'manufacturer' => $this->faker->realText(),
            "name" => $this->faker->name(),
            'description' => $this->faker->realText(30),
        ];
    }
}
