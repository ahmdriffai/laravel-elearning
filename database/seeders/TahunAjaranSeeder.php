<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAjaran::truncate();
        TahunAjaran::factory()->create(['tahun' => 2020, 'semester' => 'ganjil', 'is_active' => 1]);
        TahunAjaran::factory()->create(['tahun' => 2020, 'semester' => 'genap']);
    }
}
