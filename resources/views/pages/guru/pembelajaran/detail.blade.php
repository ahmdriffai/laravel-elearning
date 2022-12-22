@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $pembelajaran->pelajaran->nama }} - {{ $pembelajaran->kelas->first()->nama }}</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('guru.pembelajaran.index') }}" class="btn btn-sm btn-primary">Kembali</a>
        <a href="{{ route('guru.materi.create', ['pembelajaranId' => $pembelajaran->id]) }}" class="btn btn-sm btn-primary">Tambah Materi</a>
        @include('pages.guru.materi.list')
    </div>
</div>
@endsection
