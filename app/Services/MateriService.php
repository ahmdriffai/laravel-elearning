<?php

namespace App\Services;

use App\Http\Requests\MateriAddRequest;

interface MateriService
{
    function add(MateriAddRequest $request);
    function uploadFile($id, $file);
}
