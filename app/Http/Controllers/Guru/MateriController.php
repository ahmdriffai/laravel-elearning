<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\MateriAddRequest;
use App\Repositories\MateriRepository;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    private $materiRepository;

    public function __construct(MateriRepository $materiRepository)
    {
        $this->materiRepository = $materiRepository;
    }


    public function create($pembelajaranId) {
        return view('pages.guru.materi.create', compact('pembelajaranId'));
    }

    public function store(MateriAddRequest $request) {
        $detail = [
            'judul' => $request->input('judul'),
            'ringkasan' => $request->input('ringkasan'),
            'isi' => $request->input('isi'),
            'pembelajaran_id' => $request->input('pembelajaran_id'),
        ];

        try {
            $materi = $this->materiRepository->create($detail);
            return redirect()->route('guru.pembelajaran.detail', ['id' => $materi->pembelajaran_id])
                ->with('success', 'Materi berhasil ditambahkan');
        }catch (\Exception $exception) {
            abort(500, 'Server Error');
        }
    }
}
