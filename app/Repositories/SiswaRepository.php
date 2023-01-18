<?php


namespace App\Repositories;


interface SiswaRepository
{
    function create($detail);
    function findById($id);
    function findByNim($nis);
    function update($id, $detail);
    function getAll();
}
