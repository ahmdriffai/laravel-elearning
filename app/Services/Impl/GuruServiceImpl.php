<?php


namespace App\Services\Impl;


use App\Http\Requests\GuruAddRequest;
use App\Repositories\GuruRepository;
use App\Repositories\UserRepository;
use App\Services\GuruService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruServiceImpl implements GuruService
{

    private $guruRepository;
    private $userRepository;

    public function __construct(GuruRepository $guruRepository, UserRepository $userRepository)
    {
        $this->guruRepository = $guruRepository;
        $this->userRepository = $userRepository;
    }


    function add(GuruAddRequest $request)
    {
        $nip = $request->input('nip');

        try {
            DB::beginTransaction();
            $detailUser = [
                'username' => $nip,
                'password' => Hash::make($nip),
                'role' => 'guru',
            ];

            $user = $this->userRepository->create($detailUser);

            $detailGuru = [
                'nama' => $request->input('nama'),
                'nip' => $nip,
                'alamat' => $request->input('alamat'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'user_id' => $user->id,
                'no_hp' => $request->input('no_hp'),
            ];

            $guru = $this->guruRepository->create($detailGuru);
            DB::commit();

            return $guru;
        }catch (\Exception $e) {
            DB::rollBack();
        }
    }

    function update(GuruAddRequest $request, $id)
    {
        $detailGuru = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_hp' => $request->input('no_hp'),
        ];

        $guru = $this->guruRepository->update($id, $detailGuru);

        return $guru;
    }
}
