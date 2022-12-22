<?php


namespace App\Repositories;


interface PembelajaranReposiory
{
    function create($detail);
    function findByGuruPelajaranTahunAjaran($idGuru, $idPelajaran, $tahunAjaran);
}
