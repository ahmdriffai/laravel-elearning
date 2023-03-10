<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\PembelajaranIsExist;
use App\Exceptions\TahunAjaranNotExistException;
use App\Http\Controllers\Controller;
use App\Http\Requests\PembelajaranAddRequest;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Pembelajaran;
use App\Repositories\PembelajaranReposiory;
use App\Repositories\TahunAjaranRepository;
use App\Services\PembelajaranService;
use Illuminate\Http\Request;

class PembelajaranController extends Controller
{
    private $pembelajaranService;
    private $tahunAjaranRepository;

    /**
     * PembelajaranController constructor.
     * @param $pembelajaranService
     */
    public function __construct(PembelajaranService $pembelajaranService, TahunAjaranRepository $tahunAjaranRepository)
    {

        $this->pembelajaranService = $pembelajaranService;
        $this->tahunAjaranRepository = $tahunAjaranRepository;
    }

    public function index() {
        $tahunAjaran = $this->tahunAjaranRepository->findByIsActive();
        $pembelajaran = Pembelajaran::where('tahun_ajaran_id', $tahunAjaran->id)->get();
        return view('pages.admin.pembelajaran.index', compact('pembelajaran', 'tahunAjaran'));
    }

    public function create() {
        $guru = Guru::pluck('nama', 'id')->all();
        $kelas = Kelas::pluck('nama', 'id')->all();
        $pelajaran = Pelajaran::pluck('nama', 'id')->all();
        return view('pages.admin.pembelajaran.create', compact('guru', 'kelas', 'pelajaran'));
    }

    public function store(PembelajaranAddRequest $request) {
        try {
            $this->pembelajaranService->add($request);
            return redirect()->route('admin.pembelajaran.index')->with('success', 'Berhasil menambahkan pembelajaran');
        } catch (PembelajaranIsExist $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput($request->all());
        }catch (TahunAjaranNotExistException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }catch (\Exception $exception) {
            abort(500, 'Server Error');
        }
    }

    public function edit($id) {
        $guru = Guru::pluck('nama', 'id')->all();
        $kelas = Kelas::pluck('nama', 'id')->all();
        $pelajaran = Pelajaran::pluck('nama', 'id')->all();
        $pembelajaran = Pembelajaran::find($id);
        return view('pages.admin.pembelajaran.edit', compact('pembelajaran', 'guru', 'kelas', 'pelajaran'));
    }

    public function update(PembelajaranAddRequest $request, $id) {
        try {
            $pembelajaran = $this->pembelajaranService->update($id, $request);
            return redirect()->route('admin.pembelajaran.index')->with('success', 'Berhasil mengubah pembelajaran');
        } catch (PembelajaranIsExist $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput($request->all());
        }catch (TahunAjaranNotExistException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }catch (\Exception $exception) {
            dd($exception);
            abort(500, 'Server Error');
        }
    }

    public function delete($id) {
        try {
            Pembelajaran::destroy($id);
            return redirect()->back()->with('success', 'Pembelajaran berhasi dihapus');
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Pembelajaran sedang digunakan , tidak bisa dihapus !!');
        }
    }
}
