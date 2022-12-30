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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($user as $item)
                    <tr>
                        @if(count($user) == 0)
                            <td colspan="3">Data tidak ditemukan</td>
                        @endif
                        <td>#</td>
                        <td>{{ $item->siswa()->nama ?? $item->guru->nama ?? $item->username }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <form onSubmit="if(!confirm('Yakin ingin generate password ?')){return false;}" method="POST" action="{{ route('admin.user.generate-password', $item->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm mt-2">Generate Password</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
