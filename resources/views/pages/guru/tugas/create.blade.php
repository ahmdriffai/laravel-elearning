@extends('layouts.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Tugas Pembelajaran</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'guru.tugas.store', 'method' => 'post', 'files' => true]) !!}

                    {{ Form::hidden('pembelajaran_id', $pembelajaranId) }}
                    <div class="form-group">
                        {!! Form::label('judul', 'Judul'); !!}
                        {!! Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('ringkasan', 'Ringkasan', ['class' => 'form-label']); !!}
                        <div class="input-group input-group-merge">
                            {!! Form::textarea('ringkasan', null, array('class' => 'form-control', 'id' => 'ringkasan', 'width' => '100%')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('file', 'File Tugas'); !!}
                        {!! Form::file('file', ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">* ukuran file max. 1M (pdf)</small>

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
