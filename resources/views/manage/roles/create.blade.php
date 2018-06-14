@extends('layouts.manage')

@section('content')

<div class="flex-container">

	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Create New Role</h2>
		</div>
	</div>

	<hr class="hr-special">

	<form action="{{ route('roles.store') }}" method="POST">
		{{ csrf_field() }}

		<div class="columns">
			<div class="column">
				<div class="box">
					<article class="media">
						<div class="media-content">
							<div class="content">
								<h2 class="title">Role Details:</h2>

								<div class="field">
									<label for="display_name" class="label">Display Name (humna readable):</label>
									<p class="control">
										<input type="text" class="input" name="display_name" id="display_name" >
									</p>
								</div>

								<div class="field">
									<label for="name" class="label">Slug:</label>
									<p class="control">
										<input type="text" class="input" name="name" id="name">
									</p>
								</div>

								<div class="field">
									<label for="description" class="label">Description:</label>
									<p class="control">
										<input type="text" class="input" name="description" id="description">
									</p>
								</div>

								<input type="hidden" :value="permissionSelected" name="permission_selected">

							</div>
						</div>
					</article>
				</div>
			</div>
		</div> <!-- end .columns -->

		<div class="columns">
			<div class="column">
				<div class="box">
					<article class="media">
						<div class="media-content">
							<div class="content">
								<h2 class="title">Permissions: </h2>
								
								@foreach($permissions as $row)
								<div class="field">
									<b-checkbox v-model="permissionSelected" :native-value="{{ $row->id }}">{{ $row->display_name }} <em class="m-l-10">{{ $row->description }}</em></b-checkbox>
								</div>
								@endforeach

							</div>
						</div>
					</article>
				</div>
			</div>
		</div>

		<button class="button is-success" type="submit">Create New Role</button>

	</form>

</div>

@endsection

@section('scripts')
<script>
	var app = new Vue({
		el: '#app',
		data: {
			permissionSelected: []
		}
	});
</script>
@endsection