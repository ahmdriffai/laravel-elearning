<?php


namespace App\Services;


use App\Http\Requests\GuruAddRequest;

interface GuruService
{
    function add(GuruAddRequest $request);

}
