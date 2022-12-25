<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSiswa = User::factory()->create([
            'username' => '111',
            'password' => Hash::make('111'),
            'role' => 'siswa',
        ]);
    
        $userGuru = User::factory()->create([
            'username' => '222',
            'password' => Hash::make('222'),
            'role' => 'guru',
        ]);

        Siswa::factory()->create(['nis' => '111', 'user_id' => $userSiswa->id]);
        Guru::factory()->create(['nip' => '222', 'user_id' => $userGuru->id]);
    }
}
