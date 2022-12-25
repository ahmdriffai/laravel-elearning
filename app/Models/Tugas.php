<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $guarded = [];

    public function siswa() {
        return $this->belongsToMany(Siswa::class,'tugas_siswa')
            ->withPivot('file_tugas', 'ringkasan_tugas', 'nilai')
            ->withTimestamps();
    }
}
