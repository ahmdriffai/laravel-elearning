<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasAddRequest;
use App\Models\Kelas;
use App\Repositories\KelasRepository;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    private $kelasRepository;

    /**
     * KelasController constructor.
     * @param $kelasRepository
     */
    public function __construct(KelasRepository $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }


    public function index() {
        $kelas = Kelas::all();
        return view('pages.admin.kelas.index    ', compact('kelas'));
    }

    public function store(KelasAddRequest $request) {
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');

        try {
            $this->kelasRepository->create($nama, $deskripsi);
            return redirect()->back()->with('success', 'Kelas berhasil ditambah');
        }catch (\Exception $exception) {
            abort(500, "Maaf, Terjadi kesalahan pada server kami");
        }
    }

    public function update(KelasAddRequest $request, $id) {
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');

        try {
            $this->kelasRepository->update($id, $nama, $deskripsi);
            return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diubah');
        }catch (\Exception $exception) {
            abort(500, "Maaf, Terjadi kesalahan pada server kami");
        }
    }

    public function delete($id) {
        try {
            $this->kelasRepository->delete($id);
            return redirect()->back()->with('success', 'Kelas berhasi dihapus');
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Kelas sedang digunakan , tidak bisa dihapus !!');
        }
    }

    public function edit($id) {
        $kelas = Kelas::find($id);

        return view('pages.admin.kelas.edit', compact('kelas'));
    }

}
