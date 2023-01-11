<?php


namespace App\Repositories\Eloquent;


use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Repositories\PelajaranRepository;

class PelajaranRepositoryImpl implements PelajaranRepository
{

    public function create($nama, $deskripsi)
    {
        $pelajaran = new Pelajaran([
            'nama' => $nama,
            'deskripsi' => 'deskripsi',
        ]);
        $pelajaran->save();
        return $pelajaran;
    }

    public function findById($id)
    {
       return Pelajaran::find($id);
    }

    public function delete($id)
    {
        Pelajaran::destroy($id);
    }

    function update($id, $nama, $deskripsi)
    {
        $pelajaran = Pelajaran::find($id)->update([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
        ]);

        return $pelajaran;
    }
}
