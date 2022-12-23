<?php


namespace App\Services;

use App\Http\Requests\DiskusiPembelajaranAddRequest;

interface DiskusiPembelajaranService
{
    function add(DiskusiPembelajaranAddRequest $request);
    function vote($id);
    function unvote($id);
}
