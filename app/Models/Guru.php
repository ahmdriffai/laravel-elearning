<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $guarded = [];

    public function pelajaran() {
        return $this->belongsToMany(Pelajaran::class)
            ->using(Pembelajaran::class)
            ->withPivot(['id', 'tahun_ajaran_id']);
    }
}
