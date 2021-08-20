<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::get(); 
        // return view('welcome', compact('posts'));

        // dd(User::find(1)->name);

        $posts = Post::all();

        
        $data = [];

        for ($i=0; $i < count($posts); $i++) { 
            $data[$i] = [
                'id'=>$posts[$i]['id'],
                'title'=>$posts[$i]['title'],
                'content'=>$posts[$i]['content'],
                'posted_by'=>User::find($posts[$i]['user_id'])->name
            ];
        }
        // dd($data);
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => 1	
        ]);
        
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post=[
            'id'=>$post['id'],
                'title'=>$post['title'],
                'content'=>$post['content'],
                'posted_by'=>User::find($post['user_id'])->name
        ];
        return view('view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // return view('edit',compact('post'));
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $updatedPost = Post::find($post['id']);

        $updatedPost->title = $request->title;
        $updatedPost->content = $request->content;

        $updatedPost->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        Post::destroy($post->id);
        return redirect('/posts');
    }
}
