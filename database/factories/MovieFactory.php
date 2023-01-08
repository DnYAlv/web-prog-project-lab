<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        static $count = 0;
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(2),
            'director' => $this->faker->name(),
            'release_date' => $this->faker->dateTime(),
            'image_thumbnail' => 'movie_' . ++$count . '.jpg',
            'background' => 'tmovie_' . $count . '.jpg',
        ];
    }
}
