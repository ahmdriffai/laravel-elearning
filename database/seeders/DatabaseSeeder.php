<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(CreateAdminSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(TahunAjaranSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
