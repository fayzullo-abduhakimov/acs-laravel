<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => ['en' => $this->faker->sentence(), 'ru' => $this->faker->sentence()],
            'description' => ['en' => $this->faker->paragraph(), 'ru' => $this->faker->paragraph()],
            'content'     => ['en' => $this->faker->text(), 'ru' => $this->faker->text()],
            'slug'        => $this->faker->unique()->slug(),
            'status'      => 1,
            'order_by'    => 0,
        ];
    }
}
