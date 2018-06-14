@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h2 class="title">Create New User</h2>
		</div>
	</div>
	
	<hr class="hr-special">

	<form action="{{ route('users.store') }}" method="POST">
	{{ csrf_field() }}
		<div class="columns">
			<div class="column">
				<div class="field">
					<label for="name" class="label">Name: </label>
					<p class="control">
						<input type="text" name="name" id="name" class="input">
					</p>
				</div>

				<div class="field">
					<label for="email" class="label">Email: </label>
					<p class="control">
						<input type="email" name="email" id="email" class="input">
					</p>
				</div>

				<div class="field">
					<label for="password" class="label">Password: </label>
					<p class="control">
						<input type="password" name="password" id="password" class="input" v-if="!auto_password" placeholder="Manually Give User Password this user">
						<b-checkbox class="m-t-10" namme="auto_generate" v-model="auto_password">Auto Generated Password</b-checkbox>
					</p>
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
				<button class="button is-success" style="width: 250px">Create New User</button>
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
        auto_password: true,
        roleSelected: {!! old('roles') ? old('role') : '[]' !!}
      }
    });
  </script>
@endsection