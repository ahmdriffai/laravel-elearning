@extends('layouts.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Guru</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.guru.update', $guru->id], 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama Guru'); !!}
                        {!! Form::text('nama', $guru->nama, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nip', 'Nomer Induk Pegawai'); !!}
                        {!! Form::text('nip', $guru->nip, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'Alamat'); !!}
                        {!! Form::text('alamat', $guru->alamat, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('no_hp', 'Nomer HP'); !!}
                        {!! Form::text('no_hp', $guru->no_hp, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin'); !!}
                        {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], $guru->jenis_kelamin, ['class' => 'form-control', 'placeholder' => '-- pilih jenis kelamin --']) !!}
                    </div>
                    {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary']]); !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
