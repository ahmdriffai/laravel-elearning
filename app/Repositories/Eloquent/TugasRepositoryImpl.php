<?php


namespace App\Repositories\Eloquent;

use App\Models\Tugas;
use App\Repositories\TugasRepository;

class TugasRepositoryImpl implements TugasRepository
{
    function create($detail) {
        $tugas = new Tugas($detail);
        $tugas->save();
        return $tugas;
    }
}
