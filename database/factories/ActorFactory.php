<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $count = 0;
        $gender = "Male";
        if(rand(0, 1)) {
            $gender = "Female";
        }
        return [
            'name' => $this->faker->name(),
            'gender' => $gender,
            'biography' => $this->faker->paragraph(2),
            'date_of_birth' => $this->faker->dateTime(),
            'place_of_birth' => $this->faker->country(),
            'image_url' => 'actor' . ++$count . '.png',
            'popularity' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
