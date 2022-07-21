<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'company_id' => $this->faker->integer(),
            'description' => $this->faker->sentence(),
            'link' => $this->faker->url(),
            'time_on' => $this->faker->time(),
            'time_off' => $this->faker->time(),
            'date_on' => $this->faker->date(),
            'date_off' => $this->faker->date(),
            'global' => $this->faker->boolean(),
            'created' => now(),
            'last_modified' => now(),
            'notes' => $this->faker->paragraph(5)
        ];
    }
}
