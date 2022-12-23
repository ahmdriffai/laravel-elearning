@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    Selamat Datang 
                    {{ Auth::user()->siswa->nama ?? Auth::user()->guru->nama ?? Auth::user()->username ?? '' }}
                </div>
            </div>
        </div>
    </div>
@endsection