@extends('layouts.main')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabmah Siswa</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.siswa.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama Siswa'); !!}
                        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nis', 'Nomer Induk Siswa'); !!}
                        {!! Form::text('nis', null, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'Alamat'); !!}
                        {!! Form::text('alamat', null, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tanggal_lahir', 'Tanggal Lahir'); !!}
                        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('no_hp', 'Nomer HP'); !!}
                        {!! Form::text('no_hp', null, ['class' => 'form-control', 'placeholder' => 'ex: 2019150000']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin'); !!}
                        {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], null, ['class' => 'form-control', 'placeholder' => '-- pilih jenis kelamin --']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('kelas_id', 'Kelas'); !!}
                        {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control', 'placeholder' => '-- pilih kelas --']) !!}
                    </div>
                    {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary']]); !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
