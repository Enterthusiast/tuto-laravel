<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;

use App\Http\Requests\EditPostRequest;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    //
    public function index(Request $request)
    {
        // $posts = Post::published()->get();
        // $posts = Post::searchByTitle($request->query->get('search'))->get();
        // $posts = $post->load('category');
        // $posts = Post::with(['category' => function($query) {
        //     $query->select('name');
        // }])->get();
        $posts = Post::with('category')->get();
        return view('posts/index', compact('posts'));
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $post->tags()->sync($request['tags_id']);
        return redirect(route('post.show', $post));
    }

    public function create()
    {
        $post = new Post();
        // $tags_id = $post->tags->pluck('id');
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $options = ['method' => 'postput', 'url' => route('post.store', $post)];
        return view('posts/create', compact('post', 'categories', 'tags', 'options'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts/show', compact('post'));
    }

    public function update($id, EditPostRequest $request)
    {
        $formValue = $request->all();
        if(!isset($formValue['online'])) {
            $formValue['online'] = 0;
        }

        $post = Post::findOrFail($id);
        $post->update($formValue);
        // $post->tags()->sync($formValue['tags_id']);
        return redirect(route('post.edit', $post));
    }

    public function destroy($id)
    {
        
    }

    public function edit($id, Request $request)
    {
        $errors = Session::get('errors');
        $errorMessages = null;
        if(isset($errors)) {
            $errorMessages = $errors->all();
        }

        $post = Post::findOrFail($id);
        // $tags_id = $post->tags->pluck('id');
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $options = ['method' => 'put', 'url' => route('post.update', $post)];
        return view('posts/create', compact('post', 'categories', 'tags', 'options', 'errorMessages'));
    }
}
