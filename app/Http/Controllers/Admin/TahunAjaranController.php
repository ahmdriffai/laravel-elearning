<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\TahunAjaranExistException;
use App\Http\Controllers\Controller;
use App\Http\Requests\TahunAjaranAddRequest;
use App\Models\TahunAjaran;
use App\Services\TahunAjaranService;
use Exception;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    private TahunAjaranService $tahunAjaranService;

    public function __construct(TahunAjaranService $tahunAjaranService) {
        $this->tahunAjaranService = $tahunAjaranService;
    }

    public function index() {
        $tahunAjaran = TahunAjaran::all();
        return view('pages.admin.tahun-ajaran.index', compact('tahunAjaran'));
    }

    public function store(TahunAjaranAddRequest $request) {
        try {
            $this->tahunAjaranService->add($request);
            return redirect()->back()->with('success', 'Berhasil menambah tahun ajaran');
        }catch (TahunAjaranExistException $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }catch (Exception $th) {
            abort(500);
        }
    }

    public function activate($id) {
        try {
            $this->tahunAjaranService->activate($id);
            return redirect()->back()->with('success', 'Berhasil aktifkan tahun ajaran');
        }catch (Exception $th) {
            abort(500);
        }
    }
}
