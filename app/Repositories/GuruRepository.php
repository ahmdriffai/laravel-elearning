<?php


namespace App\Repositories;


interface GuruRepository
{
    function create($detail);
    function update($id, $detail);
}
