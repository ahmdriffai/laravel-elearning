<?php


namespace App\Services;

use App\Http\Requests\TugasAddRequest;
use App\Http\Requests\TugasSubmitRequest;

interface TugasService
{
    function add(TugasAddRequest $request);
    function submit(TugasSubmitRequest $request, $siswaId);
    function uploadFile($id, $file);

    function updateNilai($tugasId, $siswaId, $nilai);
}
