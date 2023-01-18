<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaImportRequest;
use App\Http\Requests\SiswaAddRequest;
use App\Http\Requests\SiswaUpdateRequest;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Repositories\KelasRepository;
use App\Repositories\SiswaRepository;
use App\Repositories\UserRepository;
use App\Services\SiswaService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    private $siswaService;
    private $siswaRepository;
    private $kelasRepository;
    private $userRepository;

    public function __construct(SiswaService $siswaService, 
                        KelasRepository $kelasRepository, 
                        SiswaRepository $siswaRepository,
                        UserRepository $userRepository
                        )
    {
        $this->siswaService = $siswaService;
        $this->siswaRepository = $siswaRepository;
        $this->kelasRepository = $kelasRepository;
        $this->userRepository = $userRepository;
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

    public function edit($id) {
        $siswa = Siswa::find($id);
        $kelas = Kelas::pluck('nama', 'id')->all();

        return view('pages.admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(SiswaUpdateRequest $request, $id) {
        try {
            $this->siswaService->update($request, $id);
            return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambah');
        } catch (\Exception $exception) {
            abort(500, "Maaf, Terjadi kesalahan pada server kami");
        }
    }

    public function delete($id) {
        try {
            Siswa::destroy($id);
            return redirect()->back()->with('success', 'Siswa berhasi dihapus');
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Siswa sudah masuk pembelajaran , tidak bisa dihapus !!');
        }
    }

    public function import(MahasiswaImportRequest $request) {
        try {
            Excel::import(new SiswaImport($this->siswaRepository, $this->kelasRepository, $this->userRepository), $request->file('file'));
            return redirect()->back()->with('success', 'Siswa berhasi dihapus');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Siswa sudah masuk pembelajaran , tidak bisa dihapus !!');
        }
    }
}
