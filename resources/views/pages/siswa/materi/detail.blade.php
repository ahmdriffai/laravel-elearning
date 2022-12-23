@extends('layouts.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $materi->judul }}</h6>
        </div>
        <div class="card-body">
            @if($materi->link_youtube != null)
                <div class="flex justify-content-center">
                    <iframe src="{{ $materi->link_youtube }}" frameborder="0" width="100%" height="400" allowfullscreen></iframe>
                </div>
            @endif

            <div class="mt-3">
                {!! $materi->isi !!}
            </div>
        </div>
    </div>
@endsection
