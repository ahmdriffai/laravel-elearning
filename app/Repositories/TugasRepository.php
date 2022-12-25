<?php

namespace App\Repositories;

interface TugasRepository
{
    function create($detail);
    function update($id, $detail);
}
