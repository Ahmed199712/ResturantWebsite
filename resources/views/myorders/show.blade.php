@extends('layouts.app')

@section('content')

	<div class="container about myorders">
		<h3 >{{ trans('backend.showdetails') }}</h3>


		
		<div class="row">
			<div class="col-md-6">
				<div class="myImage">
					<img src="{{ asset($order->food->image) }}" style="width: 100%">
				</div>
			</div>
			<div class="col-md-6">
				<div class="myInfo">
					<h4>Name : {{ $order->food->name }}</h4>
					<hr>
					<h4>User : {{ $order->user->name }}</h4>
					<hr>
					<h4>Price : {{ $order->food->price }}</h4>
					<hr>
					<h4>Discount : {{ $order->food->discount }}</h4>
					<hr>
					<h4>Name : {{ $order->food->desc }}</h4>
					<hr>
					<a id="myOrder" href="{{ route('user.myorder.delete' , $order->id) }}" class="btn btn-danger">Delete</a>
				</div>
			</div>
		</div>


	</div>


@endsection
