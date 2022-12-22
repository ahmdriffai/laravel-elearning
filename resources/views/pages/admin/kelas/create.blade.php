<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabmah Kelas</h6>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.kelas.store']) !!}
        <div class="form-group">
            {!! Form::label('nama', 'Nama Kelas'); !!}
            {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'ex: 10A']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('deskripsi', 'Deskripsi Kelas'); !!}
            {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary']]); !!}
        {!! Form::close() !!}
    </div>
</div>
