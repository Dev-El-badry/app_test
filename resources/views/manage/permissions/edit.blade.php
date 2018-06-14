@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Edit Permission</h2>
		</div>
		
	</div>

	<hr class="hr-special">	

	<div class="columns">
		<div class="column">
			<div class="card">	
				<div class="card-content">
					<form action="{{ route('permissions.update', $permission->id) }}" method="POST">

						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="field" v-if="permissionType == 'basic'">
							<label for="display_name" class="label">Name (Display Name):</label>
							<p class="control">
								<input type="text" class="input" name="display_name" id="display_name" value="{{ $permission->display_name }}">
							</p>
						</div>

						<div class="field" v-if="permissionType == 'basic'">
							<label for="name" class="label">Slug <small>(Cannot be changed)</small>:</label>
							<p class="control">
								<input type="text" class="input" name="name" id="name" value="{{ $permission->name }}" disabled>
							</p>
						</div>

						<div class="field" v-if="permissionType == 'basic'">
							<label for="description" class="label">Description:</label>
							<p class="control">
								<input type="text" class="input" name="description" id="description" placeholder="describe what this permission does" value="{{ $permission->description }}">
							</p>
						</div>

						<button class="button is-success" type="submit">Save Changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
