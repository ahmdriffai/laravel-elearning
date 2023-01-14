<?php


namespace App\Repositories;


interface KelasRepository
{
    function create($nama, $deskripsi);
    function delete($id);
    function update($id, $nama, $deskripsi);
    function getAll();
}
