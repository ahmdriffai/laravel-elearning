@extends('layouts.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $tugas->judul }}</h6>
        </div>
        <div class="card-body">
            {!! $tugas->ringkasan !!}

            <h6 class="m-0 font-weight-bold text-primary my-3">Pengumpulan Tugas Siswa</h6>
            @include('pages.guru.tugas.list-siswa')

        </div>
    </div>
@endsection
