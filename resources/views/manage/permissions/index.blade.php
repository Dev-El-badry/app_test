@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Permissions Manage</h2>
		</div>
		<div class="column">
			<a href="{{ route('permissions.create') }}" class="button is-primary is-pulled-right">
			<i class="fa fa-plus"></i> &nbsp;
			Create New Permission</a>
		</div>
	</div>

	<hr class="hr-special">	

	<div class="columns">
		<div class="column">
			<div class="card">	
				<div class="card-content">
					<table class="table is-narrow is-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach($permissions as $permission)
							<tr>
								<td>{{ $permission->display_name }}</td>
								<td>{{ $permission->name }}</td>
								<td>{{ $permission->description }}</td>
								<td>
									<a href="{{ route('permissions.show', $permission->id) }}" class="button is-outline">View</a>
									<a href="{{ route('permissions.edit', $permission->id) }}" class="button is-outline">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection