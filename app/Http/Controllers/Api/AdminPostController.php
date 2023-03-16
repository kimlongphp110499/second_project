<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ReplyPost;

class AdminPostController extends Controller
{
    public function delete($id) {
        $admin = auth()->user()->id;
        $post = Post::findOrFail($id);
        $reply_post = ReplyPost::where('post_id', $id);
        if($admin)
        {
            $post->delete();
            return response()->json([
                'message' => 'Admin delete post success',
            ], 200);
        }
                
    }
}
