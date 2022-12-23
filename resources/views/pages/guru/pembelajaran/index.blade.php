@extends('layouts.main')

@section('content')
    @php($color = ['primary', 'danger', 'warning', 'success', 'info', 'secondary'])
    <div class="row">
        @foreach($pembelajaran as $item)
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('guru.pembelajaran.detail', ['id' => $item->id]) }}" style="text-decoration: none">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                        {{ $item->kelas->nama }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->pelajaran->nama }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
