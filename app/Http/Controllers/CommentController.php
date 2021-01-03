<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $comment->author_id = $request->input('author_id');
        $comment->post_id = $request->input('post_id');
        $comment->content = $request->input('content');
        $comment->save();
        return redirect('/show/'.$comment->post_id);
    }
}
