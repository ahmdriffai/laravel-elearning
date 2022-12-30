@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('password-show'))
                <div class="alert alert-warning">
                    Berhasil generate password user ({{ Session::get('user')->name }}), <br>
                    <b>Password  : {{ Session::get('user')->password }} </b>,<br>
                    Password hanya akan ditampilan 1 kali !!. copy password agar tidak lupa ya
                </div>
            @endif
            @include('pages.admin.user.list')
        </div>
    </div>
@endsection
