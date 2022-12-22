<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\PembelajaranIsExist;
use App\Http\Controllers\Controller;
use App\Http\Requests\PelajaranAddRequest;
use App\Models\Pelajaran;
use App\Repositories\PelajaranRepository;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    private $pelajaranRepository;

    public function __construct(PelajaranRepository $pelajaranRepository)
    {
        $this->pelajaranRepository = $pelajaranRepository;
    }

    public function index()
    {
        $pelajaran = Pelajaran::all();
        return view('pages.admin.pelajaran.index', compact('pelajaran'));
    }

    public function store(PelajaranAddRequest $request)
    {
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');

        try {
            $this->pelajaranRepository->create($nama, $deskripsi);
            return redirect()->back()->with('success', 'Pelajaran berhasil ditambah');
        } catch (\Exception $exception) {
            abort(500, "Maaf, Terjadi kesalahan pada server kami");
        }
    }

    public function delete($id)
    {
        try {
            $this->pelajaranRepository->delete($id);
            return redirect()->back()->with('success', 'Pelajaran berhasi dihapus');
        }
        catch (\Exception $exception) {
            abort(500, "Maaf, Terjadi kesalahan pada server kami");
        }
    }
}

