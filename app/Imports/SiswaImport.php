<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Repositories\KelasRepository;
use App\Repositories\SiswaRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaImport implements ToCollection, WithStartRow
{
    private SiswaRepository $siswaRepository;
    private KelasRepository $kelasRepository;
    private UserRepository $userRepository;


    public function __construct(SiswaRepository $siswaRepository, 
                        KelasRepository $kelasRepository,
                        UserRepository $userRepository
    ) {
        $this->siswaRepository = $siswaRepository;
        $this->kelasRepository = $kelasRepository;
        $this->userRepository = $userRepository;
    }
  
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            if ($row[0] == null) {
                continue;
            } else {
                $siswa = $this->siswaRepository->findByNim($row[1]);
                
                $kelas = $this->kelasRepository->findByName($row[4]);


                if ($kelas == null) {
                    continue;
                } else if($siswa == null) {
                    try {
                        DB::beginTransaction();
                        $this->siswaRepository->create([
                            'nis' => $row[1],
                            'nama' => $row[2],
                            'jenis_kelamin' => $row[3],
                            'kelas_id' => $kelas->id,
                        ]);
                        $this->userRepository->create([
                            'username' => $row[1],
                            'password' => Hash::make($row[1]),
                            'role' => 'siswa',
                        ]);
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        dd($e->getMessage());
                    }
                
                }else {
                    $this->siswaRepository->update($siswa->id, [
                        'nis' => $row[1],
                        'nama' => $row[2],
                        'jenis_kelamin' => $row[3],
                        'kelas_id' => $kelas->id,
                    ]);
                }
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
