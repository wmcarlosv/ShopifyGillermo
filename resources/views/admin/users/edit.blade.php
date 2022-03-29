@extends('adminlte::page')

@section('title', 'Edit User')

@section('content')
	@include('admin.partials.errors_messages')
	<div class="row">
		<div class="col-md-12">
			<div class="card card-success">
				<div class="card-header">
					<h3><i class="fas fa-user"></i> Edit User</h3>
				</div>
				<form action="{{ route('users.update', $user->id) }}" method="POST">
					@method('PUT')
					@csrf()
					<div class="card-body">
						<div class="form-group">
							<label for="">Name:</label>
							<input type="text" name="name" value="{{ $user->name }}" class="form-control" />
						</div>
						<div class="form-group">
							<label for="">Email:</label>
							<input type="text" name="email" value="{{ $user->email }}" class="form-control" />
						</div>
						<div class="form-group">
							<label for="">Role:</label>
							<select name="role" id="role" class="form-control">
								<option value="administrator" @if($user->role == 'administrator') selected='selected' @endif>Administrator</option>
								<option value="operator" @if($user->role == 'operator') selected='selected' @endif>Operator</option>
								<option value="courrier" @if($user->role == 'courrier') selected='selected' @endif>Courier</option>
							</select>
						</div>
					</div>
					<div class="card-footer text-right">
						@include('admin.partials.form_buttons',['routeCancel'=>'users.index'])
					</div>
				</form>
			</div>
		</div>
	</div>
@stop