@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('pages.admin.tahun-ajaran.list')
        </div>
        <div class="col-md-6">
            @include('pages.admin.tahun-ajaran.create')
        </div>
    </div>
@endsection
