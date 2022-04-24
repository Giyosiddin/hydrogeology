<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'views' => rand(1,50),
            'image' => null,
            'slug' => 'test'.rand(1,100)
        ];
    }

    // public function configure()
    // {
    //     // return
    // }
}
