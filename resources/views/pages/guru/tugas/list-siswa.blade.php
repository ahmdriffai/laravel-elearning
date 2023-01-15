
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nis</th>
            <th>File Tugas</th>
            <th>Pengumpulan</th>
            <th>Status</th>
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
            <th>Status</th>
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
            <td>
                @if(strtotime($item->pivot->created_at) > strtotime($tugas->deadline))
                    <span class="badge badge-warning">Telat mengumpulkan</span>
                @else
                    <span class="badge badge-success">Mengumpulkan</span>
                @endif
            </td>
            <td>{{ $item->pivot->nilai }}</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}">
                    Update Nilai
                </button>
                @include('pages.guru.tugas.update-nilai')
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
