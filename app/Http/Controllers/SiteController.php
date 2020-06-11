<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::latest();
        if (request('categories')) {
            $categories_ids = request('categories');
            $cids = DB::table('category_post')->whereIn('category_id', $categories_ids)->pluck('post_id');
            $posts->whereIn('id', $cids);
        }
        $posts = $posts->get();
        return view('site.home', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('site.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $post = new Post(request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'categories' => 'required|exists:categories,id'
        ]));
        if ($image = $request->file('image')) {
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $filepath = $request->file('image')->storeAs('posts', $imageName, 'public');
            $post['image'] = $filepath;
        }
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->categories()->attach(request('categories'));
        return redirect(route('site.home'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('site.show', compact('post', 'comments'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('site.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        $post->update(request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'categories' => 'required|exists:categories,id'
        ]));
        if ($image = $request->file('image')) {
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $filepath = $request->file('image')->storeAs('posts', $imageName, 'public');
            $post['image'] = $filepath;
        }
        $post->save();
        $post->categories()->syncWithoutDetaching(request('categories'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        File::delete((public_path($post->image)));
        $post->delete();
        return redirect(route('site.home'));
    }

    public function storeComment(Request $request)
    {
        $comment = new Comment(request()->validate([
            'body' => 'required',
        ]));
        $comment->user_id = auth()->user()->id;
        $comment->post_id = request('post_id');
        $comment->save();
        return redirect()->back();
    }
}
