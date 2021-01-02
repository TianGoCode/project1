<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()) {
                $user = Auth::user();
                if ($user->is_admin != 1) {
                    return redirect('/');
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard', ['admin' => $user]);
    }

    public function approve()
    {
        $posts = Post::all();
        return view('admin.approve', ['posts' => $posts]);
    }

    public function users()
    {

    }

    public function createTopic()
    {
        $topics = Topic::all();
        $categories = Category::all();
        $topics = Topic::all();
        return view('admin.topic', ['topics' => $topics, 'categories' => $categories]);
    }

    public function createNewCat(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->input('new-name');
        $category->topic_id = $request->input('topic');
        $category->save();
        return redirect('/admin/topic');
    }

    public function editCat(Request $request)
    {
        $category = Category::find($request->input('category'));
        $category->category_name = $request->input('new-name');
        $category->topic_id = $request->input('topic');
        $category->touch();
        $category->save();
        return redirect('/admin/topic');
    }

    public function acceptPost(Request $request)
    {
        $pid = $request->input('post_id');
        $status = $request->input('status');
        $post = Post::find($pid);
        if ($status == 1) {
            $post->approved = 1;
            $post->is_banned = null;
            $post->touch();
            $post->save();
        } else if ($status == 0) {
            $post->approved = null;
            $post->is_banned = 1;
            $post->touch();
            $post->save();
        }
        return redirect('/admin/approve');
    }
}
