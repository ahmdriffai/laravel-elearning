<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TahunAjaranNotExistException extends Exception
{
    public function __construct()
    {
        parent::__construct("Tahun ajaran belum aktif", 404);
    }
}
