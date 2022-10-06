<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {;
        return [
            'state' => 'ongoing',
            'content' => fake()->paragraphs(rand(1,5), true)
        ];
    }

    /**
     * Define the state of the page as start
     * Conventionally signify the start of the story and the page has no origin
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function starting(){
        return $this->state(function(array $attributes){
            return [
                'state' => 'start'
            ];
        });
    }

    /**
     * Define the state of the page as victory
     * Conventionally signify an end of the story and the page has no destination
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function winning(){
        return $this->state(function(array $attributes){
            return [
                'state' => 'victory'
            ];
        });
    }

    /**
     * Define the state of the page as defeat
     * Conventionally signify an end of the story and the page has no destination
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function loosing(){
        return $this->state(function(array $attributes){
            return [
                'state' => 'defeat'
            ];
        });
    }

    /**
     * Define the state of the page as ongoing
     * Signify the page has one or multiple possible origin(s) and destination(s)
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function ongoing(){
        return $this->state(function(array $attributes){
            return [
                'state' => 'ongoing'
            ];
        });
    }
}
