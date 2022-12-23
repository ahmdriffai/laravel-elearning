@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
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
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Diskusi Kelas </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('pages.siswa.diskusi.create')
                    </div>
                </div>

                @include('pages.siswa.diskusi.list')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

    <script>
        var isi = document.getElementById("isi");
        CKEDITOR.replace(isi,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.width = '100%';
    </script>
@endsection
