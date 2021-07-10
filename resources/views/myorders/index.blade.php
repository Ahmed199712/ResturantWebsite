@extends('layouts.app')

@section('content')

	<div class="container about myorders">
		<h3 >{{ trans('backend.myorders') }}</h3>


		
		@if( $myorders->count() > 0 )
			<div class="table table-responsive">
			<table class="table table-striped table-hover text-center table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Food</th>
						<th>User</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $myorders as $my )
						<tr>
							<td>{{ $my->id }}</td>
							<td>
								<img style="width: 50px;height: 50px" src="{{ asset($my->food->image) }}">
							</td>
							<td>{{ $my->food->name }}</td>
							<td>{{ $my->user->name }}</td>
							<td>
								<a href="{{ route('user.myorder.show' , $my->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
								<a id="myOrder" href="{{ route('user.myorder.delete' , $my->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<br><br><br><br><br><br><br>
		@else
			<div class="emptyOrder text-center" style="font-size:50px;border-bottom:5px solid tomato ;background-color:white;color:tomato;width: 100;padding: 110px 0">
				{{ trans('backend.noorders') }}
			</div>
		@endif



	</div>


@endsection
