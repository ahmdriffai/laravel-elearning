<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    use HasFactory;

    protected $table = 'pembelajaran';

    protected $guarded = [];

    public function guru() {
        return $this->belongsTo(Guru::class);
    }

    public function pelajaran() {
        return $this->belongsTo(Pelajaran::class);
    }

    public function tahunAjaran() {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
