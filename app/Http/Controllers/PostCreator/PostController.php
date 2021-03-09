<?php

namespace App\Http\Controllers\PostCreator;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostInsertFormRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.post.index', [
           'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostInsertFormRequest $request)
    {
        $slug = uniqid();
        $user_id = Auth::id();
        Post::create(['title' => $request->get('title'), 'content' => $request->get('content'), 'slug' => $slug, 'user_id' => $user_id, 'category_id' => $request->get('category_id')]);

        return redirect('/postcreator/post/create')->with('status', 'A Post is successfully updated Sir!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('backend.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostInsertFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if(Auth::id() == $post->user_id) {
            $post->update(['title' => $request->get('title'), 'content' => $request->get('content'), 'category_id' => $request->get('category_id')]);
            return redirect()->back()->with('status', 'A Post is successfully updated Sir!');
        }
        else
        {
            return redirect()->back()->with('error', "This post wasn't created by you!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
