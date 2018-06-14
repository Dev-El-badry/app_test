@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h2 class="title">Show Details User</h2>
		</div>
		<div class="column">
			<a href="{{ route('users.edit', $user->id) }}" class="button is-primary is-pulled-right">
			<i class="fa fa-edit"></i> &nbsp; Edit User
			</a>
		</div>
	</div>
	
	<hr class="hr-special">

	<div class="columns">
		<div class="column">
			<div class="field">
				<label for="name" class="label">Name:</label>
				<span>{{ $user->name }}</span>
			</div>
			
			<div class="field">
				<label for="email" class="label">Email:</label>
				<span>{{ $user->email }}</span>
			</div>

			<div class="field">
				<label for="email" class="label">Roles:</label>
				<ul>
					
					@forelse($user->roles as $role)
					<li>{{ $role->display_name }} <small class="m-l-15">{{ $role->description }}</small></li>
					@empty
						<p>this is user has not been assigned any roles yet</p>
					@endforelse
				</ul>
				
			</div>
		</div>
		
	</div>
</div>

@endsection