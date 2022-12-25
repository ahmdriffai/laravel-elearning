<?php


namespace App\Repositories\Eloquent;


use App\Models\Materi;
use App\Repositories\MateriRepository;

class MateriRepositoryImpl implements MateriRepository
{

    function create($detail)
    {
        $materi = new Materi($detail);
        $materi->save();
        return $materi;
    }

    function update($id, $detail)
    {
        Materi::whereId($id)->update($detail);
        return Materi::find($id);
    }
}
