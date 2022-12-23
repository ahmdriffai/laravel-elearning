{!! Form::open(['route' => 'diskusi-pembelajaran.store', 'method' => 'post']) !!}
{{ Form::hidden('pembelajaran_id', $pembelajaran->id) }}
{{ Form::hidden('user_id', Auth::user()->id) }}

<div class="input-group">
    {!! Form::textarea('komentar', null, array('class' => 'form-control', 'id' => 'isi', 'width' => '100%')) !!}
    {{-- {!! Form::text('komentar', null, ['class' => ['form-control', 'bg-light', 'small'], 'placeholder' => 'Komentar']) !!} --}}
    {!! Form::submit('Tambah', ['class' => ['btn', 'btn-primary', 'mt-2']]); !!}
</div>
{!! Form::close() !!}

