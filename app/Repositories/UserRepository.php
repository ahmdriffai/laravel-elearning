<?php


namespace App\Repositories;


interface UserRepository
{
    function create($detail);
    function update($id, $detail);
}
