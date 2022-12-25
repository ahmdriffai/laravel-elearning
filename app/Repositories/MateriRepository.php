<?php


namespace App\Repositories;


interface MateriRepository
{
    function create($detail);
    function update($id, $detail);
}
