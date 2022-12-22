<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PembelajaranIsExist extends Exception
{
    public function __construct()
    {
        parent::__construct("Pembelajarn sudah terdaftar", 422);
    }
}
