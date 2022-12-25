
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item->nama }} - {{ $item->nis }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'guru.tugas.update-nilai', 'method' => 'post']) !!}
            <div class="modal-body">
                {{ Form::hidden('siswa_id', $item->id) }}
                {{ Form::hidden('tugas_id', $tugas->id) }}
                <div class="form-group">
                    {!! Form::label('nilai', 'Nilai'); !!}
                    {!! Form::number('nilai', $item->pivot->nilai, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Submit', ['class' => ['btn', 'btn-primary']]); !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
