<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'head_office' => $this->faker->sentence(),
            'contact_name' => $this->faker->name(),
            'contact_tel' => $this->faker->phoneNumber(),
            'contact_email' => $this->faker->email(),
            'notes' => $this->faker->paragraph(5)
        ];
    }
}
