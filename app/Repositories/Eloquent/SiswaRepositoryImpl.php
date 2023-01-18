<?php


namespace App\Repositories\Eloquent;


use App\Models\Kelas;
use App\Models\Siswa;
use App\Repositories\SiswaRepository;

class SiswaRepositoryImpl implements SiswaRepository
{

    function create($detail)
    {
        $siswa = new Siswa($detail);
        $siswa->save();
        return $siswa;
    }

    function findById($id)
    {
        // TODO: Implement findById() method.
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
    }

    function update($id, $detail)
    {
        $siswa = Siswa::find($id)->update($detail);
        return $siswa;
    }

    function findByNim($nis)
    {
        $siswa = Siswa::where('nis', $nis)->first();
        return $siswa;
    }
}
