<?php


namespace App\Services\Impl;

use App\Http\Requests\DiskusiPembelajaranAddRequest;
use App\Models\DiskusiPembelajaran;
use App\Repositories\DiskusiPembelajaranRepository;
use App\Services\DiskusiPembelajaranService;

class DiskusiPembelajaranServiceImpl implements DiskusiPembelajaranService
{
    private $diskusiPembelajaranRepository;

    public function __construct(DiskusiPembelajaranRepository $diskusiPembelajaranRepository) {
        $this->diskusiPembelajaranRepository = $diskusiPembelajaranRepository;
    }

    function add(DiskusiPembelajaranAddRequest $request)
    {
        $detail = [
            'user_id' => $request->input('user_id'),
            'pembelajaran_id' => $request->input('pembelajaran_id'),
            'komentar' => $request->input('komentar'),
        ];
    
        $diskusi = $this->diskusiPembelajaranRepository->create($detail);
        
        return $diskusi;
    }

    function vote($id)
    {
        $diskusi = DiskusiPembelajaran::find($id);
        $like = $diskusi->like;
        
        $addLike = $like + 1;

        $diskusi->like = $addLike;
        $diskusi->save();
    }

    function unvote($id)
    {
        $diskusi = DiskusiPembelajaran::find($id);
        $like = $diskusi->like;
        
        $addLike = $like - 1;

        $diskusi->like = $addLike;
        $diskusi->save();
    }
}
