@extends("layouts.manage")

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">Manage Employees</h2>
		</div>

		<div class="column ">

			<a href="{{ route('employees.create') }}" class="button is-primary is-pulled-right">
				<i class="fa fa-user-plus"></i> &nbsp;Add New Employee</a>
		</div>
	</div>
	<hr class="hr-special">
	<div class="columns">
		<div class="column">
			<table class="table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Employee Name</td>
						<td>Code Identification</td>
						<td></td>
					</tr>
				</thead>

				<tbody>
				@forelse($employees as $row)
					<tr>
						<td>{{ $row->id }}</td>
						<td>{{ $row->employee_name }}</td>
						<td>{{ $row->code }}</td>
						<td>
							<p class="is-pulled-right">
								<a href="{{ route('employees.edit', $row->id) }}" class="button is-outlined">Edit</a>
								<a href="{{ route('employees.show', $row->id) }}" class="button is-outlined">View</a>
								<a href="{{ route('reports.show', $row->id) }}" class="button is-outlined">Show Report</a>
							</p>
						</td>
					</tr>
				@empty

					<p class="notification is-danger">the employees table is empty !</p>
				@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection