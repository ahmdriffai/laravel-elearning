<?php


namespace App\Repositories\Eloquent;


use App\Models\TahunAjaran;
use App\Repositories\TahunAjaranRepository;
use Illuminate\Support\Facades\DB;

class TahunAjaranRepositoryImpl implements TahunAjaranRepository
{

    function create($tahun, $semester)
    {
        $tahunAjaran = new TahunAjaran([
            'tahun' => $tahun,
            'semester' => $semester,
        ]);
        $tahunAjaran->save();
        return $tahunAjaran;
    }

    function updateIsActiveAll($isActive)
    {
        DB::table('tahun_ajaran')->update(['is_active', $isActive]);
    }

    function delete($id)
    {
        TahunAjaran::destroy($id);
    }

    function findByIsActive()
    {
        return TahunAjaran::where('is_active', 1)->first();
    }

    function findById($id)
    {
        return TahunAjaran::find($id);
    }

    function update($id, $detail)
    {
        $tahunAjaran = TahunAjaran::find($id)
            ->update($detail);

        return $tahunAjaran;
    }
}
