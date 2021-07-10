<?php
	
	use App\Message as message;
	use App\Order as order;

	if( !function_exists('getContact') ){
		function getContact($type = 'data')
		{

			if( $type == 'data' ){
				$contact = message::where('status' , 0)->orderBy('created_at' , 'desc')->get();
			}else{
				$contact = message::where('status' , 0)->count();
			}

			return $contact;

		}
	}


	if( !function_exists('getOrder') ){
		function getOrder($type = 'data')
		{

			if( $type == 'data' ){
				$orders = order::where('status' , 0)->orderBy('created_at' , 'desc')->get();
			}else{
				$orders = order::where('status' , 0)->count();
			}

			return $orders;

		}
	}