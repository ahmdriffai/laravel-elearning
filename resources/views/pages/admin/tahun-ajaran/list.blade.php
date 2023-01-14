<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tahun Ajaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($tahunAjaran) == 0)
                    <tr>
                        <td colspan="5">Data tidak ditemukan</td>
                    </tr>
                @endif
                @foreach($tahunAjaran as $item)
                <tr>
                    <td>#</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        @if($item->is_active)
                            <a href="#" class="btn btn-sm btn-success disabled">Aktifkan</a>
                        @else
                            {!! Form::open( ['route' => ['admin.tahun-ajaran.activate', 'id' => $item->id], 'method' => 'put'])  !!}
                            {!! Form::submit('Aktifkan', ['class' => ['btn', 'btn-sm','btn-success']]); !!}
                            {!! Form::close() !!}
                        @endif
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
