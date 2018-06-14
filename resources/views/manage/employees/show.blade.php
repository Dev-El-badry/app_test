@extends("layouts.manage")

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Show Employee Details:</h2>
		</div>

		<div class="column ">
			<a href="{{ route('employees.edit', $employee->id) }}" class="button is-primary is-pulled-right">Edit Employee Details</a>
		</div>
	</div>
	<hr class="hr-special">
	<div class="columns">
		<div class="column">
			<div class="field">
				<label for="name" class="label">Employee Name:</label>
				<span>{{ $employee->employee_name }}</span>
			</div>

			<div class="field">
				<label for="name" class="label">Code:</label>
				<span>{{ $employee->code }}</span>
			</div>
		</div>
	</div>
</div>

@endsection