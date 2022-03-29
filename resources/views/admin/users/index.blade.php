@extends('adminlte::page')

@section('title', 'Users')

@section('content')
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-12">
			<div class="card card-success">
				<div class="card-header">
					<h3><i class="fas fa-users"></i> Users</h3>
				</div>
				<div class="card-body">
					<a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> New</a>
					<br />
					<br />
					<table class="table table-bordered table-striped">
						<thead>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Actions</th>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->role }}</td>
									<td>
										@include('admin.partials.action_buttons',['routeEdit'=>'users.edit','id'=>$user->id, 'routeDelete'=>'users.destroy'])
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	@include('admin.partials.messages')
@stop