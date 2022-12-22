<?php


namespace App\Repositories;


interface TahunAjaranRepository
{
    function create($tahun, $semester);
    function update($id, $detail);
    function updateIsActiveAll($isActive);
    function delete($id);
    function findByIsActive();
    function findById($id);
}
