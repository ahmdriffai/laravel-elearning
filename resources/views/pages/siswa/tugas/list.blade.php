<div class="accordion" id="accordionExample">
    <h5 class="m-0 font-weight-bold text-black my-4 ml-2">Daftar Tugas Pembelajaran</h5>
    @if($tugas->count() == 0)
        <div class="alert alert-primary" role="alert">
            Tugas Belum Tersedia
        </div>
    @endif
    @foreach($tugas as $item)
        @php(
            $tugasSiswa = DB::table('tugas_siswa')->where('siswa_id', Auth::user()->siswa->id )->where('tugas_id', $item->id)->first()
        )
        <div class="card border mb-4">
            <!-- Card Header - Accordion -->
            <a href="#tugas{{ $item->id }}" class="d-block card-header py-3" data-toggle="collapse"
               role="button" aria-expanded="true" aria-controls="tugas{{ $item->id }}">
                <h6 class="m-0 font-weight-bold text-primary"> 
                    {{ $item->judul }}
                    @if($tugasSiswa != null)
                        <span class="badge badge-success">Dikumpulkan</span>
                    @endif
                    @if(strtotime($item->created_at) > strtotime($item->deadline) && $tugasSiswa != null)
                        <span class="badge badge-warning">Telat mengumpulkan</span>
                    @endif
                </h6>
                <div class="text-xs font-weight-bold @if(strtotime(Carbon::now()) > strtotime($item->deadline) && strtotime($tugasSiswa->created_at) > strtotime($item->deadline)) text-danger @else text-dark @endif text-capitalize my-1">
                Tenggat : {{ Carbon::createFromFormat('Y-m-d', $item->deadline)->format('d M, Y') }}
                </div>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="tugas{{ $item->id }}">
                <div class="card-body">
                    {!! $item->ringkasan  !!}
                    <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
                    <a target="_blank" href="{{ Storage::disk('public')->url($item->file) }}">View / Download</a>
                </div>
                <div class="card-footer">
                    @if($tugasSiswa != null)
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}">
                            Submit Ulang Tugas
                        </button>
                        <a href="{{ Storage::disk('public')->url($item->siswa->first()->pivot->file_tugas) }}">file-tugas.pdf</a>
                    @else
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}">
                            Submit Tugas
                        </button>
                    @endif
                    @include('pages.siswa.tugas.submit')
                </div>
            </div>
        </div>
    @endforeach

</div>
