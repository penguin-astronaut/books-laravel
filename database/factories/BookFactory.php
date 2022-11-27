<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ids = User::where('id' ,'>' ,0)->pluck('id')->toArray();

        return [
            'title' => fake()->text(150),
            'description' => fake()->text(),
            'user_id' => $ids[array_rand($ids)],
        ];
    }
}
