<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\MateriAddRequest;
use App\Models\Materi;
use App\Repositories\MateriRepository;
use App\Services\MateriService;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    private $materiService;


    public function __construct(MateriService $materiService)
    {
        $this->materiService = $materiService;
    }


    public function create($pembelajaranId) {
        return view('pages.guru.materi.create', compact('pembelajaranId'));
    }

    public function store(MateriAddRequest $request) {
        try {
            $materi = $this->materiService->add($request);
            $this->materiService->uploadFile($materi->id, $request->file('file'));

            return redirect()->route('guru.pembelajaran.detail', ['id' => $materi->pembelajaran_id, 'idKelas' => $materi->kelas_id])
                ->with('success', 'Materi berhasil ditambahkan');
        }catch (\Exception $exception) {
            abort(500, 'Server Error');
        }
    }

    public function detail($id) {
        $materi = Materi::find($id);
        return view('pages.guru.materi.detail', compact('materi'));
    }
}
