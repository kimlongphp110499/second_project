<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Reply;
use App\Models\ReplyPost;
use App\Models\Post;

class ReplyPostController extends Controller
{
    public function reply(Request $request, $post_id){
    	$validator = Validator::make($request->all(), [
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        \DB::beginTransaction();

        try {
            $post = Post::findOrFail($post_id);
            $reply = Reply::create(['content' => $request->content, 'user_id' => auth()->user()->id]);
            $reply_post = ReplyPost::create(['post_id' => $post->id, 'reply_id' => $reply->id]);

            \DB::commit();
            // all good
        } catch (\Exception $e) {
            \DB::rollback();
            // something went wrong
        }
      
    }
}
