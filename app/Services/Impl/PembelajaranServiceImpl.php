<?php


namespace App\Services\Impl;


use App\Exceptions\PembelajaranIsExist;
use App\Exceptions\TahunAjaranNotExistException;
use App\Http\Requests\PembelajaranAddRequest;
use App\Models\Kelas;
use App\Repositories\PembelajaranReposiory;
use App\Repositories\TahunAjaranRepository;
use App\Services\PembelajaranService;
use App\Services\TahunAjaranService;
use Illuminate\Support\Facades\DB;

class PembelajaranServiceImpl implements PembelajaranService
{

    private $tahunAjaranRepository;
    private $pembelajaranRepositoy;

    /**
     * PembelajaranServiceImpl constructor.
     * @param $tahunAjaranRepository
     * @param $pembelajaranRepositoy
     */
    public function __construct(TahunAjaranRepository $tahunAjaranRepository, PembelajaranReposiory $pembelajaranRepositoy)
    {
        $this->tahunAjaranRepository = $tahunAjaranRepository;
        $this->pembelajaranRepositoy = $pembelajaranRepositoy;
    }

    function add(PembelajaranAddRequest $request)
    {
        //cek tahun ajaran is active
        $tahunAjaran = $this->tahunAjaranRepository->findByIsActive();
        $idGuru = $request->input('guru_id');
        $idPelajaran = $request->input('pelajaran_id');
        $kelas = $request->input('kelas_id');
        if ($tahunAjaran == null) {
            throw new TahunAjaranNotExistException();
        }

        $detail = [
            'guru_id' => $idGuru,
            'pelajaran_id' => $idPelajaran,
            'tahun_ajaran_id' => $tahunAjaran->id,
        ];

        //cek pembelajaran

        for ($i = 0; $i < count($kelas); $i++) {
            $check = $this->pembelajaranRepositoy->findByGuruPelajaranTahunAjaran(
                $idGuru,
                $idPelajaran,
                $tahunAjaran->id,
                $kelas[$i],
            );
    
            if ($check != null) {
                throw new PembelajaranIsExist();
            }
        }

        try {
            DB::beginTransaction();

            for ($i = 0; $i < count($kelas); $i++) {
                $pembelajaran = $this->pembelajaranRepositoy->create($detail, $kelas[$i]);
            }

            DB::commit();
            return $pembelajaran;
        }catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
        }

    }

    function update($id, PembelajaranAddRequest $request)
    {
        //cek tahun ajaran is active
        $tahunAjaran = $this->tahunAjaranRepository->findByIsActive();
        $idGuru = $request->input('guru_id');
        $idPelajaran = $request->input('pelajaran_id');
        $kelas = $request->input('kelas_id');
        //cek pembelajaran

        $check = $this->pembelajaranRepositoy->findByGuruPelajaranTahunAjaran(
            $idGuru,
            $idPelajaran,
            $tahunAjaran->id,
            $kelas,
        );

        if ($check != null) {
            if ($check->id != $id) {
                throw new PembelajaranIsExist();
            }
        }
        

        try {
            DB::beginTransaction();

        

            $detail = [
                'guru_id' => $idGuru,
                'pelajaran_id' => $idPelajaran,
                'tahun_ajaran_id' => $tahunAjaran->id,
                'kelas_id' => $kelas,
            ];
            $pembelajaran = $this->pembelajaranRepositoy->update($id, $detail);
    

            DB::commit();
            return $pembelajaran;
        }catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
        }        
    }
}
