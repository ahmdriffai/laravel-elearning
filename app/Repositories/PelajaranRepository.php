<?php


namespace App\Repositories;


interface PelajaranRepository
{
    public function create($nama, $deskripsi);
    public function findById($id);
    public function delete($id);
    function update($id, $nama, $deskripsi);

}
