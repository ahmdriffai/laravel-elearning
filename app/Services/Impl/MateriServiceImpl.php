<?php

namespace App\Services\Impl;

use App\Http\Requests\MateriAddRequest;
use App\Repositories\MateriRepository;
use App\Services\MateriService;
use App\Utils\Media;

class MateriServiceImpl implements MateriService
{
    use Media;

    private $materiRepository;

    public function __construct(MateriRepository $materiRepository)
    {
        $this->materiRepository = $materiRepository;
    }


    function uploadFile($id, $file)
    {
        $upload = $this->uploads($file, '/mater/file');

        $detail = [
            'file' => $upload,
        ];

        $materi = $this->materiRepository->update($id, $detail);
        return $materi;
    }

    function add(MateriAddRequest $request)
    {
        $detail = [
            'judul' => $request->input('judul'),
            'ringkasan' => $request->input('ringkasan'),
            'isi' => $request->input('isi'),
            'link_youtube' => $request->input('link_youtube'),
            'pembelajaran_id' => $request->input('pembelajaran_id'),
        ];

        $materi = $this->materiRepository->create($detail);

        return $materi;
    }
}
