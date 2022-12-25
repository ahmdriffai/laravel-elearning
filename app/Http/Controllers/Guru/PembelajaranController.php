<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\DiskusiPembelajaran;
use App\Models\Materi;
use App\Models\Pembelajaran;
use App\Models\Tugas;
use Illuminate\Http\Request;

class PembelajaranController extends Controller
{
    public function index() {
        $guru = auth()->user()->guru;
        $pembelajaran = Pembelajaran::where('guru_id', $guru->id)->get();
        return view('pages.guru.pembelajaran.index', compact('pembelajaran'));
    }

    public function detail($id) {
        $pembelajaran = Pembelajaran::find($id);
        $materi = Materi::where('pembelajaran_id', $pembelajaran->id)->get();
        $tugas = Tugas::where('pembelajaran_id', $pembelajaran->id)->get();
        $diskusiPembelajaran = DiskusiPembelajaran::where('pembelajaran_id', $pembelajaran->id)->paginate(10);

        return view('pages.guru.pembelajaran.detail', compact('pembelajaran', 'materi', 'diskusiPembelajaran', 'tugas'));
    }
}
