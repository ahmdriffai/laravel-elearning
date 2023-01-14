@extends('layouts.main')

@section('content')
{!! Form::open(array('route' => 'post-changepassword','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xl-10">
            <div class="card mb-4">
                <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Password Lama <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                {!! Form::password('old_password', array('placeholder' => 'Password Lama','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Password Baru <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                {!! Form::password('new_password', array('placeholder' => 'Password Lama','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Konfirmasi Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                {!! Form::password('confirm_password', array('placeholder' => 'Konfirmasi Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </div>
        </div>
    </div>


    {!! Form::close() !!}
@endsection