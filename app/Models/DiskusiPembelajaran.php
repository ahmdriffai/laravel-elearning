<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskusiPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'diskusi_pembelajaran';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pembelajaran() {
        return $this->belongsTo(Pembelajaran::class);
    } 
}
