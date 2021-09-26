<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
          'posts' => Post::latest()->filter(
              request(['search', ' author'])
          )->paginate(3)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
      return view('posts.show', [
        'post' => $post
      ]);
    }

    public  function create()
    {
        return view('admin.posts.create');
    }


    public  function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::exists('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/admin/post/create')->with('success', 'Post created');
    }
}
