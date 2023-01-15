<?php


namespace App\Services;


use App\Http\Requests\PembelajaranAddRequest;

interface PembelajaranService
{
    function add(PembelajaranAddRequest $request);
    function update($id, PembelajaranAddRequest $request);
}
