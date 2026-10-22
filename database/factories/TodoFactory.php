<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'category_id' => Category::inRandomOrder()->first()->id,
            'content' => fake()->randomElement([
                'Laravelを学習する',
                '買い物へ行く',
                '本を読む',
                '筋トレをする',
                'お問い合わせ機能を作る',
            ]),
        ];
    }
}
