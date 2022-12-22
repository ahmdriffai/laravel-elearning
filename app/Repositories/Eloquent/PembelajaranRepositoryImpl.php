<?php


namespace App\Repositories\Eloquent;


use App\Models\Pembelajaran;
use App\Repositories\PembelajaranReposiory;

class PembelajaranRepositoryImpl implements PembelajaranReposiory
{

    function create($detail)
    {
        $pembelajaran = new Pembelajaran($detail);
        $pembelajaran->save();
        return $pembelajaran;
    }


    function findByGuruPelajaranTahunAjaran($idGuru, $idPelajaran, $tahunAjaran)
    {
        return Pembelajaran::where('guru_id', $idGuru)
            ->where('pelajaran_id', $idPelajaran)
            ->where('tahun_ajaran_id', $tahunAjaran)
            ->first();
    }
}
