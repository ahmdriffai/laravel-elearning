<div class="accordion" id="accordionExample">
    <h5 class="m-0 font-weight-bold text-black my-4 ml-2">Daftar Tugas Pembelajaran</h5>
    @if($tugas->count() == 0)
        <div class="alert alert-primary" role="alert">
            Tugas Belum Tersedia
        </div>
    @endif
    @foreach($tugas as $item)
        <div class="card border mb-4">
            <!-- Card Header - Accordion -->
            <a href="#tugas{{ $item->id }}" class="d-block card-header py-3" data-toggle="collapse"
               role="button" aria-expanded="true" aria-controls="tugas{{ $item->id }}">
                <h6 class="m-0 font-weight-bold text-primary">{{ $item->judul }}</h6>
                @if(count($item->siswa) != 0)
                    <span class="badge badge-success">Dikumpulkan</span>
                @endif
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="tugas{{ $item->id }}">
                <div class="card-body">
                    {!! $item->ringkasan  !!}
                    <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
                    <a target="_blank" href="{{ Storage::disk('public')->url($item->file) }}">View / Download</a>
                </div>
                <div class="card-footer">
                    @if(count($item->siswa) != 0)
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}">
                            Submit Ulang Tugas
                        </button>
                        <a href="{{ Storage::disk('public')->url($item->file) }}">file-tugas.pdf</a>
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
