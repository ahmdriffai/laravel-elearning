<?php

namespace App\Exceptions;

use Exception;

class TahunAjaranExistException extends Exception
{
    public function __construct()
    {
        parent::__construct("Tahun ajaran sudah tersedia", 400);
    }
}
