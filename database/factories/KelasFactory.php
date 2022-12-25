<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(1),
            'deskripsi' => $this->faker->text(5),
        ];
    }
}
