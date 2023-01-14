<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabmah Kelas</h6>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tahun-ajaran.store']) !!}
        <div class="form-group">
            {!! Form::label('tahun', 'Tahun'); !!}
            {!! Form::number('tahun', null, ['class' => 'form-control', 'placeholder' => 'ex: 2022']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('semester', 'Semester'); !!}
            {!! Form::select('semester',['genap' => 'Genap', 'ganjil' => 'Ganjil'], null,['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary']]); !!}
        {!! Form::close() !!}
    </div>
</div>
