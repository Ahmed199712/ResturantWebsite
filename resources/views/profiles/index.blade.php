@extends('layouts.app')

@section('content')

	<div class="container about profile">
		<h3 >{{ trans('backend.profile') }}</h3>


		
		<form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row">
			<div class="col-md-5">
				<div class="myImage">
					<img class="" style="border:4px solid tomato ;padding:5px;background-color: #fff;width:100%;height: 350px" src="{{ asset($user->avatar) }}" id="imagePreview">
					<input type="file" class="form-control" id="image" name="avatar" style="margin-top: 3px">
				</div>
				<div class="form-group">
					<button style="margin-top: 10px;border-radius: 0;color: white" type="submit" class="btn btn-info btn-block"> <i class="fa fa-edit fa-fw fa-lg"></i> {{ trans('backend.edit') }}</button>
				</div>
			</div>
			<div class="col-md-7">
				<div class="infoBox" style="border-bottom:2px solid tomato;width: 100%;padding: 15px 20px 1px 20px;background-color: #eee">

					@include('includes.messages')

					<div class="form-group">
						<label>{{ trans('backend.name') }}</label>
						<input type="text" name="name" class="form-control" value="{{ auth()->guard('web')->user()->name }}">
					</div>
					<div class="form-group">
						<label>{{ trans('backend.email') }}</label>
						<input type="email" name="email" class="form-control" value="{{ auth()->guard('web')->user()->email }}">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>{{ trans('backend.password') }}</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>{{ trans('backend.password_confirmation') }}</label>
								<input type="password" name="password_confirmation" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>{{ trans('backend.phone') }}</label>
						<input type="number" name="phone" class="form-control" value="{{ auth()->guard('web')->user()->phone }}">
					</div>
					<div class="form-group">
						<label>{{ trans('backend.address') }}</label>
						<input type="text" name="address" class="form-control" value="{{ auth()->guard('web')->user()->address }}">
					</div>
				</div>
			</div>
		</div>
		</form>



	</div>


@endsection
