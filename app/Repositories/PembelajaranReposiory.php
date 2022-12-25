<?php


namespace App\Repositories;


interface PembelajaranReposiory
{
    function create($detail, $kelasId);
    function findByGuruPelajaranTahunAjaran($idGuru, $idPelajaran, $tahunAjaran, $kelasId);
}
