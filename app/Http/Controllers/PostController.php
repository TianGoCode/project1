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
            session()->flash('unknown', 'Bài viết không tồn tại');
            return redirect('/home');
        }
        $post = Post::find($id);
        if (!$post) {
            session()->flash('unknown', 'Bài viết không tồn tại');
            return redirect('/home');
        }


        if (!Auth::user()) {
            if ($post->approved != 1) {
                session()->flash('unavailable', 'Bài viết chưa thể truy cập');
                return redirect('/home');
            }
            return view('post.show', ['post' => $post]);
        }

        $currentUser = Auth::user();
        if (Auth::user()->is_admin == 1 || Auth::user()->id == $post->author_id) {
            return view('post.show', ['post' => $post, 'currentUser'=>$currentUser]);
        } else {
            if ($post->approved != 1) {
                session()->flash('unavailable', 'Bài viết chưa thể truy cập');
                return redirect('/home');
                //them thong bao bai viet chua tge ghuebn th
            }
        }

        return view('post.show', [
            'post' => $post,
            'currentUser'=>$currentUser
        ]);
    }

    public function create()
    {
        $categories = Category::all()->where('topic_id', '<>', 1);

        if (Auth::user()->is_admin == 1) {
            $adminCat = Category::all()->where('topic_id', '=', 1);
        } else {
            $adminCat = null;
        }

        $topics = Topic::all()->skip(1);
        return view('post.create', [
            'categories' => $categories,
            'topics' => $topics,
            'adminCat' => $adminCat
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
        @session()->flash('create','Tạo bài viết thành công, hãy đợi kết quả từ quản trị viên');
        return redirect('/home');
    }

    public function categoryView($id)
    {
        if ($id == null) {
            return redirect('/home');
        }
        $category = Category::find($id);
        $post = Post::all()->where('category_id', '=', $id);
        return view('post.category', [
            'posts' => $post,
            'category' => $category
        ]);
    }

    public function topicView($id)
    {
        if ($id == null) {
            return redirect('/home');
        }
        $topic = Topic::find($id);
        $categories = Category::all()->where('topic_id', '=', $id);

        return view('post.topic', [
            'categories' => $categories,
            'topic' => $topic
        ]);
    }
}
