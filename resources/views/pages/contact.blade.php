@extends('layouts.app')

@section('content')
	<div class="container contact">
		<h3>{{ trans('backend.contact') }}</h3>

		<br>



		<div class="row">

			<div class="col-md-7">
				<div class="myImage">
					<img src="{{ asset('images/contact.jpg') }}">
				</div>
			</div>
			<div class="col-md-5">
				<form method="POST" action="{{ route('user.message') }}">
					{{ csrf_field() }}

					@include('includes.messages')

					<div class="form-group">
						<div class="mainContent">
							<i class="fa fa-user fa-fw fa-lg"></i>
							<input type="text" value="{{ old('name') }}" name="name" placeholder="{{ trans('backend.name') }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="mainContent">
							<i class="fa fa-envelope fa-fw fa-lg"></i>
							<input type="email" value="{{ old('email') }}" name="email" placeholder="{{ trans('backend.email') }}" class="form-control">
						</div>
					</div>


					<div class="form-group">
						<div class="mainContent">
							<i class="fa fa-phone fa-fw fa-lg"></i>
							<input type="number" value="{{ old('phone') }}" name="phone" placeholder="{{ trans('backend.phone') }}" class="form-control">
						</div>
					</div>


					<div class="form-group">
						<div class="mainContent">
							<i class="fa fa-info fa-fw fa-lg"></i>
							<input type="text" value="{{ old('subject') }}" name="subject" placeholder="{{ trans('backend.subject') }}" class="form-control">
						</div>
					</div>


					<div class="form-group">
						<div class="mainContent">
							<i class="fa fa-send fa-fw fa-lg"></i>
							<textarea rows="5" placeholder="{{ trans('backend.message') }}" class="form-control" name="message">{{ old('message') }}</textarea>							
						</div>
					</div>



					<div class="form-group">
						<button class="btn btn-primary btn-block"><i class="fa fa-send"></i> {{ trans('backend.send') }} </button>
					</div>







				</form>
			</div>

		</div>

	</div>
@endsection
