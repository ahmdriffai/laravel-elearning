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
use App\Services\PembelajaranService;
use Illuminate\Http\Request;

class PembelajaranController extends Controller
{
    private $pembelajaranService;

    /**
     * PembelajaranController constructor.
     * @param $pembelajaranService
     */
    public function __construct(PembelajaranService $pembelajaranService)
    {
        $this->pembelajaranService = $pembelajaranService;
    }

    public function index() {
        $pembelajaran = Pembelajaran::all();
        return view('pages.admin.pembelajaran.index', compact('pembelajaran'));
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
            return redirect()->route('admin.pembelajaran.index')->with('succes', 'Berhasil menambahkan pembelajaran');
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

}
