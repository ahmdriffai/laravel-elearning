<?php


namespace App\Repositories\Eloquent;


use App\Models\Guru;
use App\Repositories\GuruRepository;

class GuruRepositoryImpl implements GuruRepository
{

    function create($detail)
    {
        $guru = new Guru($detail);
        $guru->save();
        return $guru;
    }

    function update($id, $detail)
    {
        $guru = Guru::find($id)->update($detail);
        return $guru;
    }
}
