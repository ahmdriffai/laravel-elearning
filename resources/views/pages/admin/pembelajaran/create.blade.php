@extends('layouts.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabmah Pembelajaran</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.pembelajaran.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('guru_id', 'Guru'); !!}
                        {!! Form::select('guru_id',$guru, null, ['class' => ['form-control', 'select2'], 'placeholder' => 'Pilih guru']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('pelajaran_id', 'Kelas'); !!}
                        {!! Form::select('pelajaran_id', $pelajaran, null, ['class' => ['form-control', 'select2'], 'placeholder' => 'Pilih pelajaran']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('kelas_id', 'Kelas'); !!}
                        {!! Form::select('kelas_id[]',$kelas, null, ['multiple ','class' => ['form-control', 'select2']]) !!}
                    </div>
                    {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary']]); !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve' // need to override the changed default
            });
        });
    </script>
@endsection
