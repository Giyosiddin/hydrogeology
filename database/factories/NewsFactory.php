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
            'view' => $this->rand(1,50),
            'image' => null,
        ];
    }

    // public function configure()
    // {
    //     // return
    // }
}
