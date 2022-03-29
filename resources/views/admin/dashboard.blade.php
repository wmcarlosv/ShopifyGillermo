@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{ $users->count() }}</span>
              </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-file-contract"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number">{{ $orders->count() }}</span>
              </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Url WebHook Orders</h3>
            <hr />
            <p>
                {{ route('get_orders') }}
            </p>
        </div>
    </div>
@stop

@section('js')
    @include('admin.partials.messages')
@stop