<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Pelajaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Pelajaran</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Pelajaran</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>

                @if(count($pelajaran) == 0)
                    <tr>
                        <td colspan="4">Data tidak ditemukan</td>
                    </tr>
                @endif
                @foreach($pelajaran as $item)
                <tr>
                    <td>#</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.pelajaran.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        {!! Form::open( ['route' => ['admin.pelajaran.delete', 'id' => $item->id], 'method' => 'delete'])  !!}
                        {!! Form::submit('Hapus', ['class' => ['btn', 'btn-sm','btn-danger']]); !!}
                        {!! Form::close() !!}
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
