<?php


namespace App\Services\Impl;


use App\Repositories\TahunAjaranRepository;
use App\Services\TahunAjaranService;
use Illuminate\Support\Facades\DB;

class TahunAjaranServiceImpl implements TahunAjaranService
{

    private $tahunAjaranRepository;

    /**
     * TahunAjaranServiceImpl constructor.
     * @param $tahunAjaranRepository
     */
    public function __construct(TahunAjaranRepository $tahunAjaranRepository)
    {
        $this->tahunAjaranRepository = $tahunAjaranRepository;
    }


    function activate($id)
    {
        try {
            DB::beginTransaction();

            // make tahun ajaran inactive
            $this->tahunAjaranRepository->updateIsActiveAll(0);

            // make one tahun ajaran active
            $this->tahunAjaranRepository->update($id, ['is_active' => 1]);

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
