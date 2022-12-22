@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('pages.admin.pelajaran.list')
        </div>
        <div class="col-md-6">
            @include('pages.admin.pelajaran.create')
        </div>
    </div>
@endsection
