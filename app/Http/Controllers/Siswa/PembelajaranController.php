<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DiskusiPembelajaran;
use App\Models\Materi;
use App\Models\Pembelajaran;
use App\Models\Tugas;
use Illuminate\Http\Request;

class PembelajaranController extends Controller
{
    public function index() {
        $siswa = auth()->user()->siswa;
        $idKelas= $siswa->kelas_id;
        $pembelajaran = Pembelajaran::where('kelas_id', $idKelas)->get();

        return view('pages.siswa.pembelajaran.index', compact('pembelajaran'));
    }

    public function detail($id) {
        $pembelajaran = Pembelajaran::find($id);
        $materi = Materi::where('pembelajaran_id', $pembelajaran->id)->get();
        $tugas = Tugas::with('siswa')->where('pembelajaran_id', $pembelajaran->id)->get();
        $diskusiPembelajaran = DiskusiPembelajaran::where('pembelajaran_id', $pembelajaran->id)->paginate(10);

        return view('pages.siswa.pembelajaran.detail', compact('pembelajaran', 'materi', 'diskusiPembelajaran', 'tugas'));
    }
}
