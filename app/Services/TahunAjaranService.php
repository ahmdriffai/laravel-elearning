<?php


namespace App\Services;

use App\Http\Requests\TahunAjaranAddRequest;

interface TahunAjaranService
{
    function activate($id);
    function add(TahunAjaranAddRequest $request);
}
