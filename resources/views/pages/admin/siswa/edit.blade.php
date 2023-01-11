@extends('layouts.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Siswa</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.siswa.update', $siswa->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama Siswa'); !!}
                        {!! Form::text('nama',  $siswa->nama, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nis', 'Nomer Induk Siswa'); !!}
                        {!! Form::text('nis', $siswa->nis, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'Alamat'); !!}
                        {!! Form::text('alamat', $siswa->alamat, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tanggal_lahir', 'Tanggal Lahir'); !!}
                        {!! Form::date('tanggal_lahir', $siswa->tanggal_lahir, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('no_hp', 'Nomer HP'); !!}
                        {!! Form::text('no_hp', $siswa->no_hp, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin'); !!}
                        {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], $siswa->jenis_kelamin, ['class' => 'form-control', 'placeholder' => '-- pilih jenis kelamin --']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('kelas_id', 'Kelas'); !!}
                        {!! Form::select('kelas_id', $kelas, $siswa->kelas_id, ['class' => 'form-control', 'placeholder' => '-- pilih kelas --']) !!}
                    </div>
                    {!! Form::submit('Ubah', ['class' => ['btn', 'btn-primary']]); !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
