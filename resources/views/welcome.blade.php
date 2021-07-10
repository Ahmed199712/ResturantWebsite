@extends('layouts.app')

@section('content')

<!-- Start Header Section With Carousel -->

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
  </ol>
  <div class="carousel-inner">
    @if( $sliders->count() == 0 )
    <img style="width:100%;height: 600px" src="{{ asset('uploads/sliders/defaultSlider.jpg') }}" class="d-block w-100" alt="...">
    @else
	    @foreach( $sliders as $index=>$slider )
	    	<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
		      	<img style="width:100%;height: 600px" src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
		    </div>
    	@endforeach
    @endif

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true">
    	<i class="fa fa-chevron-left fa-2x"></i>
    </span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true">
    	<i class="fa fa-chevron-right fa-2x"></i>
    </span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- End Header Section With Carousel -->


<!-- Start The Content Of The Page ....-->


    <!-- Start Our Features Section -->

    <div class="our-features">
        <div class="container">
          <h3>{{ trans('backend.features') }}</h3>

          <div class="row">

            <div class="col-lg-3 col-sm-6 col-md-6">
              <div class="box text-center"> 
                <h4>Title</h4>
                <i class="fa fa-star fa-5x"></i>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
              </div>
            </div>


             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="box text-center"> 
                <h4>Title</h4>
                <i class="fa fa-cutlery fa-5x"></i>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
              </div>
            </div>

             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="box text-center"> 
                <h4>Title</h4>
                <i class="fa fa-flag fa-5x"></i>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
              </div>
            </div>


             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="box text-center"> 
                <h4>Title</h4>
                <i class="fa fa-cogs fa-5x"></i>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
              </div>
            </div>


          </div>

        </div>
    </div>

    <!-- End Our Features Section -->


    <!-- Start Our Statistics Section -->
    <div class="our-stat">
      <div class="container">
          <h3>{{ trans('backend.statistics') }}</h3>

          <div class="row">
              
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="box">
                <div class="row">
                  <div class="col-md-6 text-center">
                    <h4>{{ trans('backend.users') }}</h4>
                    <i class="fa fa-user fa-4x"></i>
                  </div>
                  <div class="col-md-6 text-center">
                    <span>{{ $users->count() }}</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="box">
                <div class="row">
                  <div class="col-md-6 text-center">
                    <h4>{{ trans('backend.foods') }}</h4>
                    <i class="fa fa-cutlery fa-4x"></i>
                  </div>
                  <div class="col-md-6 text-center">
                    <span>{{ $foods->count() }}</span>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="box">
                <div class="row">
                  <div class="col-md-6 text-center">
                    <h4>{{ trans('backend.orders') }}</h4>
                    <i class="fa fa-shopping-cart fa-4x"></i>
                  </div>
                  <div class="col-md-6 text-center">
                    <span>{{ $orders->count() }}</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="box">
                <div class="row">
                  <div class="col-md-6 text-center">
                    <h4>{{ trans('backend.comments') }}</h4>
                    <i class="fa fa-comments fa-4x"></i>
                  </div>
                  <div class="col-md-6 text-center">
                    <span>{{ $comments->count() }}</span>
                  </div>
                </div>
              </div>
            </div>

          </div>

      </div>
    </div>
    <!-- End Our Statistics Section -->



    <!-- Start Latest Foods -->
    <div class="latest">
        <div class="container">
          <h3>{{ trans('backend.latest') }}</h3>

          <div class="row">
            @foreach($latestFoods as $index=>$food)
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


        </div>
    </div>
    <!-- End Latest Foods -->



<!-- End The Content Of The Page ....-->


@endsection
