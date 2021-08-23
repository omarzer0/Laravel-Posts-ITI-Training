<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    // the start point get all data
    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    // get one Post
    public function show($id){
        $post = Post::find($id);
        return $post;
    }

    public function store(Request $request){
        Post::create(
            [
                'title'=> $request->title,
                'content'=> $request->content,
                'user_id'=> $request->user_id
            ]);
    }

    public function update(Request $request, $id){
        $updatedPost = Post::find($id);
        $updatedPost->title = $request->title;
        $updatedPost->content = $request->content;

        $updatedPost->save();

    }

    public function destroy($id){
        Post::destroy($id);
    }
    
}
