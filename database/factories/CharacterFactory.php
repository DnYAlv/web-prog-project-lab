<?php

namespace Database\Factories;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $actorCount = Actor::count();
        $movieCount = Movie::count();
        static $count = 0;
        if($count>=$movieCount) {
            $count=0;
        }
        return [
            'actor_id' => rand(1, $actorCount),
            'movie_id' => ++$count,
            'character_name' => $this->faker->name(),
        ];
    }
}
