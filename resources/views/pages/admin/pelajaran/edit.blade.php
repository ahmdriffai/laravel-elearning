@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Pelajaran</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.pelajaran.update', $pelajaran->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama Pelajaran'); !!}
                        {!! Form::text('nama', $pelajaran->nama, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('deskripsi', 'Deskripsi Kelas'); !!}
                        {!! Form::textarea('deskripsi', $pelajaran->deskripsi, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Simpan', ['class' => ['btn', 'btn-primary']]); !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
