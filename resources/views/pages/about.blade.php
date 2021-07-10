@extends('layouts.app')

@section('content')

	<div class="container about">
		<h3 >{{ trans('backend.about') }}</h3>

		<br>

		<div class="row">

			<div class="col-md-6">
				<div class="myImage">
					<img src="{{ asset('images/about1.jpg') }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="aboutText">
					<h4>Title</h4>
					<p style="color:#888">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					</p>
					<p style="color:#888">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					</p>
				</div>
			</div>

		</div>

		<br><br><br>

		<div class="row">
			<div class="col-md-6">
				<div class="aboutText">
					<h4>Title</h4>
					<p style="color:#888">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					</p>
					<p style="color:#888">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					</p>
				</div>
			</div>


			<div class="col-md-6">
				<div class="myImage">
					<img src="{{ asset('images/about2.jpg') }}">
				</div>
			</div>

		</div>

		</div>


	</div>


@endsection
