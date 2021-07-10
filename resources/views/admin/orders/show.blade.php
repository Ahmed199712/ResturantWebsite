@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeUserURL" data-url="{{ route('user.store') }}"></span>
<span id="getOrdersURL" data-url="{{ route('order.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.order_details') }} 
        </h3>
        <div class="box-body">

            
            <div class="row">
                
                <div class="col-md-5">
                    <img style="width:100%" src="{{ asset($order->food->image) }}">
                </div>

                <div class="col-md-7">
                    <h3 class="text-center" style="margin:0;background-color:#3c8dbc;color:#fff;padding:10px 5px">{{ $order->food->name }}</h3>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="margin:0"> <i class="fa fa-user"></i> {{ trans('backend.client') }} : {{ $order->user->name }}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 style="margin:0"> <i class="fa fa-phone"></i> {{ trans('backend.phone') }} : {{ $order->user->phone }}</h4>
                        </div>
                        <div class="col-md-12">
                            <h4 style="margin:0;margin-top:10px"> <i class="fa fa-map-marker"></i> {{ trans('backend.address') }} : {{ $order->user->address }}</h4>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <h4 style="margin:0"> <i class="fa fa-money"></i> {{ trans('backend.price') }} : <b style="color:#d65353;font-size:25px">{{ $order->food->price }}</b> </h4>
                        </div>
                        <div class="col-md-4">
                            <h4 style="margin:0"> <i class="fa fa-money"></i> {{ trans('backend.discount') }} : <b style="color:#d65353;font-size:25px">{{ $order->food->discount }}</b></h4>
                        </div>
                        <div class="col-md-4">
                            <h4 style="margin:0"> <i class="fa fa-plus"></i> {{ trans('backend.total') }} : <b style="color:#d65353;font-size:25px">{{ $order->food->price - $order->food->discount }}</b> </h4>
                        </div>
                    </div>
                    <hr>

                    <h4 style="margin:0"> <i class="fa fa-info"></i> {{ trans('backend.desc') }} :- </h4>

                    <div style="background-color:#eee;padding:10px 20px;margin-top:10px;border-radius: 15px">
                         <h4 style="margin:0;line-height: 25px">{{ $order->food->desc }}</h4>
                    </div>

                </div>

            </div>
           


        </div>
    </div>




@endsection
