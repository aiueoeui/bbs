<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('exercise_date','desc')->get();
    }



    public function store(Request $request)
{
    $request->validate([
        'body' => 'required|string|max:512'
    ]);

    $comment=new Comment();
    $comment->body=$request->body;
    $comment->user_id=auth()->user()->id;
    $comment->post_id=$request->post; //最後のpost=Routeのリンク名
    $comment->save();

    // $post->comments()->create([
    //     'body' => $request->body,
    //     'user_id' => $request->user()->id
    // ]);

    return back();
 }
}
