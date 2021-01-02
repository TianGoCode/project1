<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($id)
    {

        if ($id == null) {
            return redirect('/home');
        }

        $post = Post::find($id);
        if(!Auth::user()){
            if ($post->approved != 1) {
                return redirect('/home');
            }
            return view('post.show',['post'=>$post]);
        }
        if (Auth::user()->is_admin == 1 || Auth::user()->id == $post->author_id) {
            return view('post.show',['post'=>$post]);
        }

        return view('post.show',[
            'post'=>$post
        ]);
    }

    public function create()
    {
        $categories = Category::all()->where('topic_id', '<>', 1);
        $adminCat = Category::all()->where('topic_id','=',1);
        $topics = Topic::all()->skip(1);
        return view('post.create', [
            'categories' => $categories,
            'topics' => $topics,
            'adminCat'=>$adminCat
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post();
        $user = Auth::user();
        $post->author_id = $user->id;
        $post->topic_id = Category::find($request->input('category'))->isAt->id;
        $post->category_id = $request->input('category');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect('/head');
    }
}
