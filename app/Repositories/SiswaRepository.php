<?php


namespace App\Repositories;


interface SiswaRepository
{
    function create($detail);
    function findById($id);
    function update($id, $detail);
    function getAll();
}
