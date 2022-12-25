<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\TugasAddRequest;
use App\Http\Requests\TugasUpdateNilaiRequest;
use App\Models\Tugas;
use App\Services\TugasService;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class TugasController extends Controller
{
    private $tugasService;

    /**
     * @param $tugasService
     */
    public function __construct(TugasService $tugasService)
    {
        $this->tugasService = $tugasService;
    }

    public function create($pembelajaranId) {
        return view('pages.guru.tugas.create', compact('pembelajaranId'));
    }

    public function store(TugasAddRequest $request) {
        try {
            $tugas = $this->tugasService->add($request);
            $this->tugasService->uploadFile($tugas->id, $request->file('file'));
            return redirect()->route('guru.pembelajaran.detail', [
                'id' => $tugas->pembelajaran_id,
                'idKelas' => $tugas->kelas_id]
            )->with('success', 'Tugas berhasil ditambahkan');
        }catch (Exception $exception) {
            abort(500);
        }
    }

    public function detail($id) {
        $tugas = Tugas::find($id);
        return view('pages.guru.tugas.detail', compact('tugas'));
    }

    public function updateNilai(TugasUpdateNilaiRequest $request) {
        try {
            $this->tugasService->updateNilai(
                $request->input('tugas_id'),
                $request->input('siswa_id'),
                $request->input('nilai'),
            );
            return redirect()->back()->with('success' , 'Nilai berhasil di update');
        }catch (Exception $exception) {
            abort(500);
        }
    }
}
