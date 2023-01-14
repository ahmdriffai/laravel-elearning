<?php


namespace App\Services\Impl;

use App\Exceptions\TahunAjaranExistException;
use App\Exceptions\TahunAjaranNotExistException;
use App\Http\Requests\TahunAjaranAddRequest;
use App\Models\TahunAjaran;
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
            dd($exception->getMessage());
            DB::rollBack();
        }
    }

    function add(TahunAjaranAddRequest $request)
    {
        $tahun = $request->input('tahun');
        $semester = $request->input('semester');
        
        $tahunAjaran = TahunAjaran::where('tahun', $tahun)->where('semester', $semester)->first();

        if ($tahunAjaran != null) {
            throw new TahunAjaranExistException();
        }

        $tahunAjaran = $this->tahunAjaranRepository->create($tahun, $semester);

        return $tahunAjaran;
    }
}
