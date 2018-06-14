@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h2 class="title">Edit User</h2>
		</div>
	</div>
	
	<hr class="hr-special">

	<form action="{{ route('users.update', $user->id) }}" method="POST">


		{{ method_field('PUT') }}
		{{ csrf_field() }}
		<div class="columns">
			<div class="column">
				<div class="field">
					<label for="name" class="label">Name: </label>
					<p class="control">
						<input type="text" name="name" id="name" class="input" value="{{ $user->name }}">
					</p>
				</div>

				<div class="field">
					<label for="email" class="label">Email: </label>
					<p class="control">
						<input type="email" name="email" id="email" class="input" value="{{ $user->email }}">
					</p>
				</div>

				<div class="field">
					<label for="password" class="label">Password: </label>
					
					<div class="field">
						<b-radio v-model="password_options" name="password_options" native-value="keep">Don't Change Password</b-radio>
					</div>
					<div class="field">
						<b-radio v-model="password_options" name="password_options" native-value="auto">Auto Generate New Password</b-radio>
					</div>
					<div class="field">
						<b-radio v-model="password_options" name="password_options" native-value="manual">Manually Set New Password</b-radio>
						<p class="control">
							<input type="password" name="password" id="password" class="input m-t-10" 
							v-if="password_options == 'manual'" placeholder="Manually Give User Password this user">
						</p>
					</div>
					

				</div>
			</div> <!-- end .column -->
			<div class="column">
			<h2 class="title">Roles:</h2>
				<input type="hidden" name="role_selected" :value="roleSelected">

				@foreach($roles as $role)
				<div class="field">
					<b-checkbox native-value="{{ $role->id }}" v-model="roleSelected">
						{{ $role->display_name }}
					</b-checkbox>
				</div>
				@endforeach
			</div> <!-- end column -->
		</div>
		<div class="columns">
			<div class="column">
			<hr class="hr-special">
				<button class="button is-success" style="width: 250px">Save Changes</button>
			</div>
		</div>
	</form>
	
</div>

@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        password_options: 'keep',
        roleSelected: {!! $user->roles->pluck('id') !!}
      }
    });
  </script>
@endsection