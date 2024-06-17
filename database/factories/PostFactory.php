<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'text' => $this->faker->text(500),
            'category_id' => Category::get()->random()->id,
            'user_id' => User::get()->random()->id
        ];
    }
}
