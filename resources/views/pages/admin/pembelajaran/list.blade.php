<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List</h6>
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
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                    <th>Pelajaran</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($pembelajaran as $item)
                        <tr>
                            @if(count($pembelajaran) == 0)
                                <td colspan="3">Data tidak ditemukan</td>
                            @endif
                            <td>#</td>
                            <td>{{ $item->tahunAjaran->tahun }} / {{ $item->tahunAjaran->semester }}</td>
                            <td>
                                {{ $item->kelas->nama }}
                            </td>
                            <td>{{ $item->guru->nama }}</td>
                            <td>{{ $item->pelajaran->nama }}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
