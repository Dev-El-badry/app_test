@extends('layouts.manage')

@section('content')

<div class="flex-container">
	<div class="columns m-t-20">
		<div class="column">
			<h2 class="title">View Permission Details</h2>
		</div>

		<div class="column">
			<a href="{{ route('permissions.edit', $permission->id) }}" class="button is-primary is-pulled-right">
			<i class="fa fa-edit"></i> &nbsp;
			Edit Permission Details</a>
		</div>
		
	</div>

	<hr class="hr-special">	

	<div class="columns">
		<div class="column">
			<div class="box">
				<article class="media">
					<div class="media-content">
						<div class="content">
							<p>
								<strong>{{ $permission->display_name }}</strong> <small>{{ $permission->name }}</small>

								<br>
								{{ $permission->description }}
							</p>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>

@endsection
