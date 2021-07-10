@extends('layouts.app')

@section('content')

	<div class="container showMeal">
		<h3>{{ $food->name }}</h3>


		<div class="row">
              
      <div class="col-md-6">
          <div class="myImage">
            <img width="100%" src="{{ asset($food->image) }}">
          </div>
      </div>

        <div class="col-md-6">
          <div class="foodCategory">
            <i class="fa fa-tags fa-lg fa-fw"></i> {{ trans('backend.category') }} : {{ $food->category->name }}
          </div>
          <hr>
          <div class="foodPrice">
            <i class="fa fa-money fa-lg fa-fw"></i> {{ trans('backend.price') }} : <b style="font-size:18px">{{ $food->price }}</b>
          </div>
          <hr>
          <div class="foodPrice">
            <i class="fa fa-money fa-lg fa-fw"></i> {{ trans('backend.discount') }} : <b style="font-size:18px">{{ $food->discount }}</b>
          </div>
          <hr>
          <div class="foodPrice">
            <i class="fa fa-money fa-lg fa-fw"></i> {{ trans('backend.total') }} : <b style="font-size:18px">{{ $food->price - $food->discount }}</b>
          </div>
          <hr>
          <div class="foodPrice">
            <i class="fa fa-calendar fa-lg fa-fw"></i> {{ trans('backend.date') }} : <b style="font-size:18px">{{ $food->created_at->format('d-m-Y') }}</b>
          </div>
          <hr>
          <div class="foodPrice">
            <i class="fa fa-comments-o fa-lg fa-fw"></i> Comments : <b style="font-size:18px">{{ $food->comments->count() }}</b>
          </div>
        </div>



    </div>

    <hr>

    <div class="col-md-12">
      @if( auth()->guard('web')->check() )
        @foreach( $food->order as $userOrder )
          
        @endforeach
        <a id="userOrder" style="border-radius: 0;color:#fff;background-color:#598660;border:0" href="{{ route('user.order' , $food->id) }}" class="btn btn-warning  btn-block"> <i class="fa fa-shopping-cart"></i> {{ trans('backend.ordernow') }}</a>
      @else
        <div class="alert alert-primary text-center">
          {{ trans('backend.you_must_login') }}
        </div>
      @endif
    </div>

    <hr>
    
    <div class="foodDesc">
      <h4>{{ trans('backend.desc') }}:-</h4>
      {{ $food->desc }}
    </div>


    <hr>
    <div class="foodComments">
      <div class="row">
        <div class="col-md-12">
          
          <h4>{{ trans('backend.comments') }}:-</h4>
          
          @if( $settings->first()->stop_comments == 0 )
                @if( auth()->guard('web')->check() )
                <form method="POST" id="addComment" action="{{ route('user.comment' , $food->id) }}" style="">
                  {{ csrf_field() }}

                  <input type="hidden" name="foodID" value="{{ $food->id }}">

                  <textarea required name="comment" class="form-control" rows="5"></textarea>
                  <button type="submit" class="btn btn-primary btn-block my-3"> <i class="fa fa-comments fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </button>
                </form>
              @else
                <div class="alert alert-danger text-center">
                  {{ trans('backend.login_first') }}
                </div>
              @endif
          @else
            <div class="alert alert-danger text-center">
                  {{ trans('backend.comments_disabled') }}
              </div>
          @endif


          <hr>

          <div class="clientsComments">
            @foreach( $food->comments as $comment )
              <div class="row">
                <div class="col-md-2">
                  <div class="commentImage">
                    <img style="height: 120px" src="{{ asset($comment->user->avatar) }}">
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="commentTitle">
                    <div class="header">
                      <i class="fa fa-user"></i> By : {{ $comment->user->name }}
                      &nbsp;&nbsp;&nbsp;
                      <i class="fa fa-calendar"></i> By : {{ $comment->created_at->format('d-m-Y') }}
                    </div>
                    <hr>
                    <div class="body">
                      {{ $comment->comment }}
                    </div>
                  </div>
                </div>
              </div>
              <hr>
            @endforeach
          </div>


        </div>
      </div>
    </div>



      <br><br><br><br><br>


	</div>


@endsection
