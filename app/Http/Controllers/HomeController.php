<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topics = Topic::all()->skip(1);
        $categories = Category::all();
        $posts=Post::all();
        //lay top5 bài viết
        $latest = Post::where('approved',1)->orderBy('created_at', 'desc')->take(5)->get();
       return view('head',[
           'posts'=>$latest,
           'categories'=>$categories,
           'topics'=>$topics
       ]);
    }
}
