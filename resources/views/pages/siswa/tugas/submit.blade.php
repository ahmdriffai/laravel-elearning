
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item->judul }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'siswa.tugas.submit', 'method' => 'post', 'files' => true]) !!}
            <div class="modal-body">
                {{ Form::hidden('tugas_id', $item->id) }}
                <div class="custom-file mb-3">
                    {!! Form::file('file_tugas', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                    {!! Form::label('file_tugas', 'File Tugas', ['class' => 'custom-file-label']); !!}
                    <small id="emailHelp" class="form-text text-muted">* ukuran file max. 1M (pdf)</small>
                
                </div>
                <div class="mb-3">
                    {!! Form::label('ringkasan_tugas', 'Ringkasan', ['class' => 'form-label']); !!}
                    <div class="input-group input-group-merge">
                        {!! Form::textarea('ringkasan_tugas', null, array('class' => 'form-control', 'id' => 'ringkasan', 'width' => '100%')) !!}
                    </div>
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
