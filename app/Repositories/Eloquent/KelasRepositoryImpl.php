<?php


namespace App\Repositories\Eloquent;


use App\Models\Kelas;
use App\Repositories\KelasRepository;

class KelasRepositoryImpl implements KelasRepository
{

    function create($nama, $deskripsi)
    {
        $kelas = new Kelas([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
        ]);

        $kelas->save();
        return $kelas;
    }

    function delete($id)
    {
        return Kelas::destroy($id);
    }

    function getAll()
    {
        return Kelas::all();
    }
}
