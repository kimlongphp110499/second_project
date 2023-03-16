<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;


class UserPostController extends Controller
{
     /**
     * Register a User.
     *  
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $post = auth()->user()->posts()->findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json([
            'message' => 'User update post success',
        ], 200);
                
    }
    public function delete($id) {
        $post = auth()->user()->posts()->findOrFail($id);
        $post->delete();
        return response()->json([
            'message' => 'User delete post success',
        ], 200);
                
    }

}
