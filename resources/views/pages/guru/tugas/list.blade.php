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
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="tugas{{ $item->id }}">
                <div class="card-body">
                    {!! $item->ringkasan  !!}
                </div>
                <div class="card-footer">
                    <a href="{{ route('guru.tugas.detail', ['id' => $item->id]) }}" class="btn btn-sm btn-info">Detail</a>
                    <a class="btn btn-sm btn-primary">Edit</a>
                    <a class="btn btn-sm btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
