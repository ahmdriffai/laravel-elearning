<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembelajaran Tahun Ajaran {{ $tahunAjaran->tahun }} / {{ $tahunAjaran->semester }}</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.pembelajaran.create') }}" class="btn-primary btn my-3">Tambah Pembelajaran</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                    <th>Pelajaran</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                    <th>Pelajaran</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($pembelajaran) == 0)
                    <tr>
                        <td colspan="5">Data tidak ditemukan</td>
                    </tr>
                @endif
                @foreach($pembelajaran as $item)
                        <tr>
                            <td>#</td>
                            <td>{{ $item->tahunAjaran->tahun }} / {{ $item->tahunAjaran->semester }}</td>
                            <td>
                                {{ $item->kelas->nama }}
                            </td>
                            <td>{{ $item->guru->nama }}</td>
                            <td>{{ $item->pelajaran->nama }}</td>
                            <td>
                                <a href="{{ route('admin.pembelajaran.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                {!! Form::open( ['route' => ['admin.pembelajaran.delete', 'id' => $item->id], 'method' => 'delete'])  !!}
                                {!! Form::submit('Hapus', ['class' => ['btn', 'btn-sm','btn-danger']]); !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
