<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class SiswaFactory extends Factory
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
            'nis' => $this->faker->time(),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => Arr::random(['L', 'P']),
            'tanggal_lahir' => $this->faker->date(),
            'no_hp' => $this->faker->phoneNumber(),
            'kelas_id' => Kelas::factory()->create(['nama' => Arr::random(['RPL '. $this->faker->numberBetween(1, 1000)])])->id,
            'user_id' => User::factory()->create(['role' => 'siswa'])->id,
        ];
    }
}
