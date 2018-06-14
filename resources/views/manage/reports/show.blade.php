@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-20">
			<div class="column">
				<h2 class="title">Manage Reports</h2>
			</div>
		</div>
		<hr class="hr-special">

		<div class="columns">
			<div class="column">
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>Day</th>
							<th>Login Time</th>
							<th>Logout Time</th>
						</tr>
					</thead>
					<tbody>
					@forelse($report as $key=>$row)
						<tr>
							<th>{{ ++$key }}</th>
							<td>{{ date('D', $row->login_time) }}</td>
							<td>{{ date('h:i:s A', $row->login_time) }}</td>
							<td>{{ $row->logout_time == NULL ? '-' : date('h:i:s A', $row->logout_time) }}</td>
						</tr>
					@empty
					<p>Not There Data Yet!</p>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>

	</div>
@endsection