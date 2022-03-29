@extends('adminlte::page')

@section('title', 'New User')

@section('content')
	@include('admin.partials.errors_messages')
	<div class="row">
		<div class="col-md-12">
			<div class="card card-success">
				<div class="card-header">
					<h3><i class="fas fa-user"></i> New User</h3>
				</div>
				<form action="{{ route('users.store') }}" method="POST">
					@method('POST')
					@csrf()
					<div class="card-body">
						<div class="form-group">
							<label for="">Name:</label>
							<input type="text" name="name" class="form-control" />
						</div>
						<div class="form-group">
							<label for="">Email:</label>
							<input type="text" name="email" class="form-control" />
						</div>
						<div class="form-group">
							<label for="">Role:</label>
							<select name="role" id="role" class="form-control">
								<option value="administrator">Administrator</option>
								<option value="operator">Operator</option>
								<option value="courier">Courier</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Password:</label>
							<input type="text" name="password" class="form-control" />
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