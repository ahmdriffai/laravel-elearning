<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kelas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($kelas) == 0)
                <tr>
                    <td colspan="4">Data tidak ditemukan</td>
                </tr>
                @endif
                @foreach($kelas as $item)
                <tr>
                    <td>#</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.kelas.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        {!! Form::open( ['route' => ['admin.kelas.delete', 'id' => $item->id], 'method' => 'delete'])  !!}
                        {!! Form::submit('Hapus', ['class' => ['btn', 'btn-sm','btn-danger']]); !!}
                        {!! Form::close() !!}
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
