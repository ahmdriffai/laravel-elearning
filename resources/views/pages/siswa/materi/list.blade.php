<div class="accordion" id="accordionExample">
    <h5 class="m-0 font-weight-bold text-black my-4 ml-2">Daftar Materi Pembelajaran</h5>
    @if($materi->count() == 0)
        <div class="alert alert-primary" role="alert">
            Materi Belum Tersedia
        </div>
    @endif
    @foreach($materi as $item)
        <div class="card border mb-4">
            <!-- Card Header - Accordion -->
            <a href="#materi{{ $item->id }}" class="d-block card-header py-3" data-toggle="collapse"
               role="button" aria-expanded="true" aria-controls="materi{{ $item->id }}">
                <h6 class="m-0 font-weight-bold text-primary">{{ $item->judul }}</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="materi{{ $item->id }}">
                <div class="card-body">
                    {!! $item->ringkasan  !!}
                    <h6 class="m-0 font-weight-bold text-primary">File materi</h6>
                    <a href="{{ Storage::disk('public')->url($item->file) }}">View / Download</a>
                </div>
                <div class="card-footer">
                    <a href="{{ route('siswa.materi.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-warning">Lihat materi</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
<?php
