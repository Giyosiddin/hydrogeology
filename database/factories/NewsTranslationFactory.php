<?php

namespace Database\Factories;
use App\Models\News;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'news_id' => function(){
                return News::factory()->create()->id;
            },
            'locale' => $this->faker->randomElement(['uz','ru','en']),
            'title' => $this->faker->title(),
            'description' => $this->faker->sentence(),
            'body' => $this->faker->paragraph()
        ];
    }
}
