@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h2 class="title">Manage Users</h2>
		</div>
		<div class="column">
			<a href="{{ route('users.create') }}" class="button is-primary is-pulled-right">
				<i class="fa fa-user-add m-r-10"></i> Create New User
			</a>
		</div>
	</div>
	<hr class="hr-special">
	
	<div class="card">
		<div class="card-content">
			<table class="table is-striped is-narrow">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Date Created</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ date('d-m-Y', strtotime($user->create_at)) }}</td>
						<td><a href="{{ route('users.show', $user->id) }}" class="button is-outlined">View</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	{{ $users->links()  }}
</div>

@endsection