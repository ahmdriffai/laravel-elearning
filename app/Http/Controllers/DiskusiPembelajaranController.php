<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiskusiPembelajaranAddRequest;
use App\Services\DiskusiPembelajaranService;
use Exception;

class DiskusiPembelajaranController extends Controller
{
    private $diskusiPembelajaranService;

    public function __construct(DiskusiPembelajaranService $diskusiPembelajaranService) {
        $this->diskusiPembelajaranService = $diskusiPembelajaranService;
    }

    public function store(DiskusiPembelajaranAddRequest $request) {
        try {
            $this->diskusiPembelajaranService->add($request);
            return redirect()->back()->with('success', 'Berhasil menambah komentar');
        } catch (Exception $exception) {
            abort(500);
        }
    }

    public function vote($id) {
        try {
            $this->diskusiPembelajaranService->vote($id);
            return redirect()->back()->with('success', 'Berhasil vote komentar');
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function unvote($id) {
        try {
            $this->diskusiPembelajaranService->unvote($id);
            return redirect()->back()->with('success', 'Berhasil unvote komentar');
        } catch (\Throwable $th) {
            abort(500);
        }
    }
}
