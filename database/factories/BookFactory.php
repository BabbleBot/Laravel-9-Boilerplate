<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => ucwords(fake()->words(rand(1,5), true)),
            'cover' => "https://picsum.photos/" . rand(100, 200) . "/" . rand(100, 400),
            'description' => fake()->paragraphs(2, true),
        ];
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    private function starting(){
        return $this->where('state', '=', 'starting');
    }
}
