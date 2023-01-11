<?php


namespace App\Services;


use App\Http\Requests\SiswaAddRequest;
use App\Http\Requests\SiswaUpdateRequest;

interface SiswaService
{
    function add(SiswaAddRequest $request);
    function update(SiswaUpdateRequest $request, $id);
}
