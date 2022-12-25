<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nip' => $this->faker->time(),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => Arr::random(['L', 'P']),
            'no_hp' => $this->faker->phoneNumber(),
            'user_id' => User::factory()->create(['role' => 'guru'])->id,
        ];
    }
}
