@extends('layouts.app')

@section('content')

	<div class="container meals">
		<h3>{{ trans('backend.meals') }}</h3>


		<div class="row">
            @foreach($meals as $index=>$food)
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="foodBox text-center">
                  <div class="foodImage">
                    <img src="{{ asset($food->image) }}">
                  </div>
                  <div class="foodTitle">
                    {{ $food->name }}
                  </div>

                  <div class="foodDateAndCategory text-center">
                    <div class="row">
                      <div class="col-md-6">
                        <span class="hint"><i class="fa fa-tags"></i> {{ $food->category->name }}</span>
                      </div>

                       <div class="col-md-6">
                        <span class="hint"><i class="fa fa-comments"></i> {{ $food->comments->count() }}</span>
                      </div>

                    </div>
                  </div>


                      <div class="foodButton text-center">
                        <a href="{{ route('page.meals.show' , $food->id) }}" class="">{{ trans('backend.showDetails') }}</a>
                      </div>

                  <span class="foodPrice">{{ $food->price - $food->discount }}</span>
                </div>
              </div>
            @endforeach


          </div>

          <br>
          <div class="text-center">
          	{{ $meals->links() }}
          </div>

          <br><br><br><br><br>


	</div>


@endsection
