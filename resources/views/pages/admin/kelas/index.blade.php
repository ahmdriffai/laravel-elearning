@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('pages.admin.kelas.list')
        </div>
        <div class="col-md-6">
            @include('pages.admin.kelas.create')
        </div>
    </div>
@endsection
