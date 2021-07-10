@extends('layouts.app')

@section('content')

	<div class="container about">
		<h3>{{ trans('backend.login') }}</h3>

		<form method="POST" action="{{ route('user.doLogin') }}" class="userLoginForm">
			{{ csrf_field() }}

			@include('includes.messages')


			<div class="form-group">
				<label>{{ trans('backend.email') }}</label>
				<input type="email" name="email" placeholder="{{ trans('backend.email') }}" class="form-control">
			</div>

			<div class="form-group">
				<label>{{ trans('backend.password') }}</label>
				<input type="password" name="password" placeholder="{{ trans('backend.password') }}" class="form-control">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-danger btn-block"> <i class="fa fa-sign-in fa-lg fa-fw"></i> {{ trans('backend.login') }}</button>
			</div>


		</form>


	</div>


@endsection
