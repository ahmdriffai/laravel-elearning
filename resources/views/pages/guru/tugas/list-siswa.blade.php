
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nis</th>
            <th>File Tugas</th>
            <th>Pengumpulan</th>
            <th>Nilai</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nis</th>
            <th>File Tugas</th>
            <th>Pengumpulan</th>
            <th>Nilai</th>
            <th>Action</th>

        </tr>
        </tfoot>
        <tbody>

        @foreach($tugas->siswa as $item)
        <tr>
            @if(count($tugas->siswa) == 0)
            <td colspan="3">Belum ada pengumpulan tugas</td>
            @endif
            <td>#</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nis }}</td>
            <td>
                <a target="_blank" href="{{ Storage::disk('public')->url($item->pivot->file_tugas) }}">View / Download</a>
            </td>
            <td>{{ $item->pivot->created_at }}</td>
            <td>{{ $item->pivot->nilai }}</td>
            <td>
                <a class="btn btn-sm btn-info">Buat Nilai</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
