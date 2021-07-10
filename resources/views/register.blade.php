@extends('layouts.app')

@section('content')

	<div class="container about">
		<h3>{{ trans('backend.register') }}</h3>

		<form method="POST" action="{{ route('user.doRegister') }}" class="userLoginForm">
			{{ csrf_field() }}

			@include('includes.messages')

			
			<div class="row">

				<div class="col-md-6">
					<div class="form-group">
						<label>{{ trans('backend.name') }}</label>
						<input type="text" name="name" value="{{ old('name') }}" placeholder="{{ trans('backend.name') }}" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>{{ trans('backend.email') }}</label>
						<input type="email" name="email" value="{{ old('email') }}" placeholder="{{ trans('backend.email') }}" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>{{ trans('backend.password') }}</label>
						<input type="password" name="password" placeholder="{{ trans('backend.password') }}" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>{{ trans('backend.password_confirmation') }}</label>
						<input type="password" name="password_confirmation" placeholder="{{ trans('backend.password_confirmation') }}" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>{{ trans('backend.phone') }}</label>
						<input type="number" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('backend.phone') }}" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>{{ trans('backend.address') }}</label>
						<input type="text" name="address" value="{{ old('address') }}" placeholder="{{ trans('backend.address') }}" class="form-control">
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-danger btn-block"> <i class="fa fa-lock fa-lg fa-fw"></i> {{ trans('backend.register') }}</button>
					</div>
				</div>

			</div>


		</form>


	</div>


@endsection
