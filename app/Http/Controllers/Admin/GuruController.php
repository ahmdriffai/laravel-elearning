<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuruAddRequest;
use App\Http\Requests\GuruUpdateRequest;
use App\Models\Guru;
use App\Services\GuruService;
use Illuminate\Http\Request;

class GuruController extends Controller
{

    private $guruService;

    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }


    public function index() {
        $guru = Guru::paginate(10);
        return view('pages.admin.guru.index', compact('guru'));
    }
    public function create() {
        return view('pages.admin.guru.create');
    }

    public function store(GuruAddRequest $request) {

        try {
            $siswa = $this->guruService->add($request);
            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil ditambah');
        }catch (\Exception $e) {
            abort('Server Error');
        }
    }

    public function delete($id) {
        try {
            Guru::destroy($id);
            return redirect()->back()->with('success', 'Guru berhasi dihapus');
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Guru sudah masuk pembelajaran , tidak bisa dihapus !!');
        }
    }

    public function update(GuruUpdateRequest $request, $id) {

        try {
            $guru = $this->guruService->update($request, $id);
            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil ditambah');
        }catch (\Exception $e) {
            abort('Server Error');
        }
    }
    public function edit($id) {
        $guru = Guru::find($id);
        return view('pages.admin.guru.edit', compact('guru'));
    }
}
