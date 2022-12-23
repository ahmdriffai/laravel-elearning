<?php


namespace App\Repositories\Eloquent;

use App\Models\DiskusiPembelajaran;
use App\Repositories\DiskusiPembelajaranRepository;

class DiskusiPembelajaranRepositoryImpl implements DiskusiPembelajaranRepository
{
    function create($detail) {
        $diskusi = new DiskusiPembelajaran($detail);
        $diskusi->save();
        return $diskusi;
    }
}
