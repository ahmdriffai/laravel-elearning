<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Siswa</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.siswa.create') }}" class="btn-primary btn my-3">Tambah Siswa</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Action</th>

                </tr>
                </tfoot>
                <tbody>

                @foreach($siswa as $item)
                    <tr>
                        @if(count($siswa) == 0)
                            <td colspan="3">Data tidak ditemukan</td>
                        @endif
                        <td>#</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->kelas->nama }}</td>
                        <td>
                            <a href="{{ route('admin.siswa.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        {!! Form::open( ['route' => ['admin.siswa.delete', 'id' => $item->id], 'method' => 'delete'])  !!}
                        {!! Form::submit('Hapus', ['class' => ['btn', 'btn-sm','btn-danger']]); !!}
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
