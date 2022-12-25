<?php


namespace App\Services\Impl;

use App\Http\Requests\TugasAddRequest;
use App\Http\Requests\TugasSubmitRequest;
use App\Models\Tugas;
use App\Repositories\TugasRepository;
use App\Services\TugasService;
use App\Utils\Media;
use Illuminate\Validation\UnauthorizedException;

class TugasServiceImpl implements TugasService
{
    use Media;
    private $tugasRepository;

    public function __construct(TugasRepository $tugasRepository) {
        $this->tugasRepository = $tugasRepository;
    }

    function add(TugasAddRequest $request){
        $detail = [
            'judul' => $request->input('judul'),
            'ringkasan' => $request->input('ringkasan'),
            'pembelajaran_id' => $request->input('pembelajaran_id'),
        ];

        return $this->tugasRepository->create($detail);
    }

    function submit(TugasSubmitRequest $request, $siswaId)
    {
        $file = $request->file('file_tugas');
        $ringkasanTugas = $request->input('ringkasan_tugas');
        $tugasId = $request->input('tugas_id');

        $tugas = Tugas::find($tugasId);

        if ($siswaId == null) {
            throw new UnauthorizedException();
        }

        $pathFile = $this->uploads($file, '/tugas/file/');

        $tugas->siswa()->syncWithPivotValues($siswaId, [
            'file_tugas' => $pathFile,
            'ringkasan_tugas' => $ringkasanTugas,
        ]);

        return $tugas;

    }
}
