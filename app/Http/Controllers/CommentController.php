<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Food;
use App\User;

class CommentController extends Controller
{
    
	public function store($foodId)
	{	

		$userId = auth()->guard('web')->user()->id;
		
		$comment = new Comment;
		$comment->comment = request('comment');
		$comment->user_id = $userId;
		$comment->food_id = $foodId;
		$comment->save();


		return response()->json($comment);

		
	}

}
