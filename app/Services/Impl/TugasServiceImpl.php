<?php


namespace App\Services\Impl;

use App\Http\Requests\TugasAddRequest;
use App\Http\Requests\TugasSubmitRequest;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Repositories\TugasRepository;
use App\Services\TugasService;
use App\Utils\Media;
use Illuminate\Support\Facades\DB;
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
            'deadline' => $request->input('deadline'),
        ];

        return $this->tugasRepository->create($detail);
    }

    function submit(TugasSubmitRequest $request, $siswaId)
    {
        $file = $request->file('file_tugas');
        $ringkasanTugas = $request->input('ringkasan_tugas');
        $tugasId = $request->input('tugas_id');

        $siswa = Siswa::find($siswaId);

        if ($siswaId == null) {
            throw new UnauthorizedException();
        }

        $pathFile = $this->uploads($file, '/tugas/file/');

        $tugassiswa = Siswa::whereHas('tugas', function ($q) use ($tugasId) {
           $q->where('tugas.id', $tugasId);
        })->get();

        if (count($tugassiswa) > 0){
            DB::table('tugas_siswa')->where('siswa_id', $siswaId)
                ->where('tugas_id', $tugasId)->delete();
        }

        $siswa->tugas()->attach($tugasId, [
            'file_tugas' => $pathFile,
            'ringkasan_tugas' => $ringkasanTugas,
        ]);

        return $siswa;

    }

    function uploadFile($id, $file)
    {
        $upload = $this->uploads($file, '/tugas/file/');

        $detail = [
            'file' => $upload,
        ];

        $materi = $this->tugasRepository->update($id, $detail);
        return $materi;
    }

    function updateNilai($tugasId, $siswaId, $nilai)
    {
        return DB::table('tugas_siswa')->where('siswa_id', $siswaId)
            ->where('tugas_id', $tugasId)->update([
                'nilai' => $nilai
            ]);
    }
}
