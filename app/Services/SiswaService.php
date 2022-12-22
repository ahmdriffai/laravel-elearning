<?php


namespace App\Services;


use App\Http\Requests\SiswaAddRequest;

interface SiswaService
{
    function add(SiswaAddRequest $request);
}
