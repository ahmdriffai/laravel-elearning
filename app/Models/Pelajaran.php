<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    protected $table = 'pelajaran';

    protected $guarded = [];

    public function guru() {
        return $this->belongsToMany(Guru::class)
            ->using(Pembelajaran::class)
            ->withPivot(['id', 'tahun_ajaran_id']);
    }
}
