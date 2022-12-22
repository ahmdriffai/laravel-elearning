<div class="accordion" id="accordionExample">
    <h5 class="m-0 font-weight-bold text-black my-4 ml-2">Daftar Materi Pembelajaran</h5>
    @foreach($materi as $item)
        <div class="card border mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample{{ $item->id }}" class="d-block card-header py-3" data-toggle="collapse"
               role="button" aria-expanded="true" aria-controls="collapseCardExample{{ $item->id }}">
                <h6 class="m-0 font-weight-bold text-primary">{{ $item->judul }}</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample{{ $item->id }}">
                <div class="card-body">
                    {!! $item->ringkasan  !!}
                </div>
                <div class="card-footer">
                    <a class="btn btn-info">Edit</a>
                    <a class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
