@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $pembelajaran->pelajaran->nama }} - {{ $pembelajaran->kelas->first()->nama }}</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('siswa.pembelajaran.index') }}" class="btn btn-sm btn-primary">Kembali</a>
        <h5 class="m-0 font-weight-bold text-black my-4 ml-2">Deskripsi Pelajaran</h5>
        <p class="mx-2">
            {{ $pembelajaran->pelajaran->deskripsi }}
        </p>
        @include('pages.siswa.materi.list')
    </div>
</div>
@endsection
