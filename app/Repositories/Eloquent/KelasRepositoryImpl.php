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

    function update($id, $nama, $deskripsi)
    {
        $kelas = Kelas::find($id)->update([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
        ]);

        return $kelas;
    }

    function findByName($name)
    {
        $kelas = Kelas::where('nama', $name)->first();

        return $kelas;
    }
}
