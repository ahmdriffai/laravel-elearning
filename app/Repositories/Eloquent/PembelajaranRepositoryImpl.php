<?php


namespace App\Repositories\Eloquent;


use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Repositories\PembelajaranReposiory;

class PembelajaranRepositoryImpl implements PembelajaranReposiory
{

    function create($detail, $kelasId)
    {
        $kelas = Kelas::find($kelasId);
        $pembelajaran = new Pembelajaran($detail);
        $kelas->pembelajaran()->save($pembelajaran);
        return $pembelajaran;
    }


    function findByGuruPelajaranTahunAjaran($idGuru, $idPelajaran, $tahunAjaran, $kelasId)
    {
        return Pembelajaran::where('guru_id', $idGuru)
            ->where('pelajaran_id', $idPelajaran)
            ->where('tahun_ajaran_id', $tahunAjaran)
            ->where('kelas_id', $kelasId)
            ->first();
    }

    function update($id, $detail)
    {
        $pembelajaran = Pembelajaran::find($id)->update($detail);
        return $pembelajaran;
    }
}
