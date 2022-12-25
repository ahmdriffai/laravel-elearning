@extends('layouts.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabmah Kelas</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'guru.materi.store', 'method' => 'post', 'files' => true]) !!}

                    {{ Form::hidden('pembelajaran_id', $pembelajaranId) }}
                    <div class="form-group">
                        {!! Form::label('judul', 'Judul'); !!}
                        {!! Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('isi', 'Isi / Materi', ['class' => 'form-label']); !!}
                        <div class="input-group input-group-merge">
                            {!! Form::textarea('isi', null, array('class' => 'form-control', 'id' => 'isi', 'width' => '100%')) !!}
                        </div>
                    </div>
                    <div class="mb-3">
                        {!! Form::label('ringkasan', 'Ringkasan', ['class' => 'form-label']); !!}
                        <div class="input-group input-group-merge">
                            {!! Form::textarea('ringkasan', null, array('class' => 'form-control', 'id' => 'ringkasan', 'width' => '100%')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('file', 'File Materi'); !!}
                        {!! Form::file('file', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link_youtube', 'Link Youtube'); !!}
                        {!! Form::text('link_youtube', null, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                        <div class="form-text">* kosongkan jika tidak ada link youtube</div>
                        <div class="form-text">
                            untuk panduan link youtube bisa
                            <a href="https://www.webhozz.com/blog/cara-memasukkan-video-youtube-ke-dalam-html/" target="_blank">lihat disini</a>
                        </div>
                    </div>

                    {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary']]); !!}
                    {!! Form::close() !!}
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

        var ringkasan = document.getElementById("ringkasan");
        CKEDITOR.replace(ringkasan,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.width = '100%';
    </script>
@endsection
