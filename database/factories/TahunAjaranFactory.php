<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TahunAjaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun' => $this->faker->year(),
            'semester' => Arr::random(['ganjil', 'genap']),
            'is_active' => 0,
        ];
    }
}
