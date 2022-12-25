<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\TugasSubmitRequest;
use App\Services\TugasService;
use Illuminate\Validation\UnauthorizedException;

class TugasController extends Controller
{
    private $tugasService;

    public function __construct(TugasService $tugasService)
    {
        $this->tugasService = $tugasService;
    }

    public function submit(TugasSubmitRequest $request){
        $siswaId = auth()->user()->siswa->id;

        try {
            $this->tugasService->submit($request, $siswaId);
            return redirect()->back()->with('success', 'Berhasil upload tugas');
        } catch (UnauthorizedException $exception) {
            abort(302);
        }catch (\Exception $exception) {
            dd($exception);
            abort(500);
        }
    }

}
