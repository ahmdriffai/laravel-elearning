<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaAddRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Repositories\KelasRepository;
use App\Repositories\SiswaRepository;
use App\Services\SiswaService;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private $siswaService;

    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }


    public function index() {
        $siswa = Siswa::paginate(10);
        return view('pages.admin.siswa.index', compact('siswa'));
    }
    public function create() {
        $kelas = Kelas::pluck('nama', 'id')->all();
        return view('pages.admin.siswa.create', compact('kelas'));
    }

    public function store(SiswaAddRequest $request) {

        try {
            $siswa = $this->siswaService->add($request);
            return redirect()->route('admin.siswa.index')
                ->with('success', 'Siswa berhasil ditambah');
        }catch (\Exception $e) {
            abort('Server Error');
        }
    }

    public function detail($id) {

    }
}
