<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()->with('categories')->orderBy('published_at', 'desc')->get();

        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function adminIndex()
    {
        $posts = Post::all();

        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function unpublishedPosts()
    {
        $unpublished_posts = Post::unpublished();
        return view('posts.unpublished-posts', ['posts'=>$unpublished_posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('author-post');

        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('author-post');

        if($request->publish_status == 'published') {
            $this->authorize('publish-post');
        }

        if(! $request->categories) {
            $request->categories = ['1'];
        }

        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required',
            'publish_status' => 'required',
            'published_at' => 'required_if:publish_status,publish',
        ]);

        $post = auth()->user()->posts()->create($request->all());

        $post->categories()->sync($request->categories);

        return redirect()->route('posts.admin-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $categories = Category::all();

        if(! $post) return response('Sorry, Nothing found here.', 404); 

        return view('posts.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update-post', $post);

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update-post', $post);

        if($request->publish_status == 'published') {
            $this->authorize('publish-post');
        }

        if(! $request->categories) {
            $request->categories = ['1'];
        }

        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required',
            'publish_status' => 'required',
            'published_at' => 'required_if:publish_status,publish',
        ]);

        $post->update($request->all());

        $post->categories()->sync($request->categories);

        return redirect()->route('posts.admin-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete-post');
        $post->delete();
        return redirect()->route('posts.index');
    }
}
