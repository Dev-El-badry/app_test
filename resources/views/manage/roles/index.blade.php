@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Manage Roles</h2>
		</div>
		<div class="column">
			<a href="{{ route('roles.create') }}" class="button is-primary is-pulled-right">
			<i class="fa fa-plus"></i> &nbsp;
			Create New Role</a>
		</div>
	</div>

	<div class="columns">
		@foreach($roles as $role)
		<div class="column is-one-quarter">
			<div class="box">
				<article class="media">
					<div class="media-content">
						<div class="content">
							<h3 class="title">{{ $role->display_name }}</h3>
							<h4 class="subtitle"><em>{{ $role->name }}</em></h4>
							<p>
								{{ $role->description }}
							</p>
						</div> <!-- end .content -->

						<div class="columns is-mobile">
							<div class="column is-one-half">
								<a href="{{ route('roles.edit', $role->id) }}" class="button is-primary is-fullwidth">Edit</a>
							</div>
							<div class="column is-one-half">
								<a href="{{ route('roles.show', $role->id) }}" class="button is-light is-fullwidth">Details</a>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
		@endforeach
	</div>

</div>

@endsection