@extends('layouts.main')

@section('content')
    <div class="row">
        @foreach($pembelajaran as $item)
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{ route('siswa.pembelajaran.detail', ['id' => $item->id]) }}" style="text-decoration: none">
                    @if($item->tahunAjaran->is_active)
                    <div class="card border-left-success shadow h-100 py-2">
                    @else
                    <div class="card border-left-secondary shadow h-100 py-2">
                    @endif
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                        {{ $item->kelas->nama }}
                                    </div>
                                    <div class="text-xs font-weight-bold text-primary text-capitalize my-1">
                                        Tahun Ajaran {{ $item->tahunAjaran->tahun }} / {{ $item->tahunAjaran->semester }}
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->pelajaran->nama }}</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase my-1">
                                        {{ $item->guru->nama }}</div>
                                    @if($item->tahunAjaran->is_active)
                                    <span class="badge badge-success">Pembelajaran Aktif</span>  
                                    @else
                                    <span class="badge badge-secondary">Pembelajaran Tidak Aktif</span>  
                                    @endif 
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
