@extends("layouts.manage")

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Create New Employee</h2>
		</div>

		
	</div>
	<hr class="hr-special">
	<div class="columns">
		<div class="column">
		@if ($errors->any())
		    <div class="notification is-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
			<form action="{{ route('employees.store') }}" method="POST">
				{{ csrf_field() }}
				<div class="field">
					<label for="employee_name" class="label">Employee Name:</label>
					<input type="text" class="input" name="employee_name" id="employee_name">
				</div>

				<div class="field">
					<label for="code" class="label">Code:</label>
					<input type="text" class="input" name="code" id="code">
				</div>

				<button class="button is-primary">Add New Employee</button>
			</form>
		</div>
	</div>

@endsection