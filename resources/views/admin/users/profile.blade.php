@extends('adminlte::page')

@section('title', 'Profile')

@section('content')
    @include('admin.partials.errors_messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3><i class="fas fa-user"></i> Profile</h3>
                </div>
                <form action="{{ route('update_profile') }}" method="POST">
                    @method('PUT')
                    @csrf()
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" />
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        @include('admin.partials.form_buttons',['routeCancel'=>'dashboard'])
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3><i class="fas fa-key"></i> Change Password</h3>
                </div>
                <form action="{{ route('change_password') }}" method="POST">
                    @method('PUT')
                    @csrf()
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Password: </label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Password Confirmation: </label>
                            <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        @include('admin.partials.form_buttons',['routeCancel'=>'dashboard'])
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop