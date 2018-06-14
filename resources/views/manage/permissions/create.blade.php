@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Create New Permission</h2>
		</div>
		
	</div>

	<hr class="hr-special">	

	<div class="columns">
		<div class="column">
			<div class="card">	
				<div class="card-content">
					<form action="{{ route('permissions.store') }}" method="POST">
						{{ csrf_field() }}
						<div class="block">
							<b-radio v-model="permissionType" name="permission_type"  native-value="basic">
							Basic Permissions</b-radio>
							<b-radio v-model="permissionType" name="permission_type"  native-value="crud">
							CRUD Permissions</b-radio>
						</div>

						<div class="field" v-if="permissionType == 'basic'">
							<label for="display_name" class="label">Name (Display Name):</label>
							<p class="control">
								<input type="text" class="input" name="display_name" id="display_name">
							</p>
						</div>

						<div class="field" v-if="permissionType == 'basic'">
							<label for="name" class="label">Slug:</label>
							<p class="control">
								<input type="text" class="input" name="name" id="name">
							</p>
						</div>

						<div class="field" v-if="permissionType == 'basic'">
							<label for="description" class="label">Description:</label>
							<p class="control">
								<input type="text" class="input" name="description" id="description" placeholder="describe what this permission does">
							</p>
						</div>

						<div class="field" v-if="permissionType == 'crud'">
							<label for="resource" class="label">Resource:</label>
							<p class="control">
								<input type="text" class="input" name="resource" id="resource" v-model="resource" placeholder="the name of resource">
							</p>
						</div>

						<div class="columns" v-if="permissionType == 'crud'">
							<div class="column is-one-quarter">
								
								<div class="field">
									<b-checkbox v-model="crudSelected" native-value="create">Create</b-checkbox>
								</div>
								<div class="field">
									<b-checkbox v-model="crudSelected" native-value="read">Read</b-checkbox>
								</div>
								<div class="field">
									<b-checkbox v-model="crudSelected" native-value="update">Update</b-checkbox>
								</div>
								<div class="field">
									<b-checkbox v-model="crudSelected" native-value="delete">Delete</b-checkbox>
								</div>
								
							</div> <!-- end .column -->

							<input type="hidden" name="crud_selected" :value="crudSelected" />

							<div class="column">
								<table class="table is-narrow" v-if="resource.length >= 3">
									<thead>
										<tr>
											<th>Name</th>
											<th>Slug</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="item in crudSelected">
											<td v-text="crudName(item)"></td>
											<td v-text="crudSlug(item)"></td>
											<td v-text="crudDescription(item)"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<button class="button is-success" type="submit">Create Permission</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script>
	var app = new Vue({
		el: '#app',
		data: {
			permissionType: 'basic',
			resource: '',
			crudSelected: ['create', 'read', 'update', 'delete']
		},
		methods: {
			crudName: function(item) {
				return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
			},
			crudSlug: function(item) {
				return item.toLowerCase() + "-" +app.resource.toLowerCase();
			},
			crudDescription: function(item) {
				return "Allow User To "+item.toLowerCase() +" a "+ app.resource.substr(0,1) + app.resource.substr(1);
			}
		}
	})
</script>
@endsection