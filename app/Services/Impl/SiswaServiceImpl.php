<?php


namespace App\Services\Impl;


use App\Http\Requests\SiswaAddRequest;
use App\Http\Requests\SiswaUpdateRequest;
use App\Repositories\SiswaRepository;
use App\Repositories\UserRepository;
use App\Services\SiswaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaServiceImpl implements SiswaService
{
    private $siswaRepository;
    private $userRepository;

    public function __construct(SiswaRepository $siswaRepository, UserRepository $userRepository)
    {
        $this->siswaRepository = $siswaRepository;
        $this->userRepository = $userRepository;
    }


    function add(SiswaAddRequest $request)
    {
        $nis = $request->input('nis');
        $nama = $request->input('nama');
        $kelasId = $request->input('kelas_id');

        try {
            DB::beginTransaction();
            $detailUser = [
                'username' => $nis,
                'password' => Hash::make($nis),
                'role' => 'siswa',
            ];

            $user = $this->userRepository->create($detailUser);

            $detailSiswa = [
                'nama' => $nama,
                'nis' => $nis,
                'alamat' => $request->input('alamat'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'kelas_id' => $kelasId,
                'user_id' => $user->id,
                'no_hp' => $request->input('no_hp'),
            ];

            $mahasiswa = $this->siswaRepository->create($detailSiswa);
            DB::commit();

            return $mahasiswa;
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    function update(SiswaUpdateRequest $request, $id)
    {
        $detailSiswa = [
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'alamat' => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'kelas_id' => $request->input('kelas_id'),
            'no_hp' => $request->input('no_hp'),
        ];

        $mahasiswa = $this->siswaRepository->update($id, $detailSiswa);

        return $mahasiswa;
    }
}
