<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(Request $request)
    {
        $grade = $request->input('grade');

        if(!empty($grade)) {
            $query->where('grade','LIKE',$grade);
        }

        $users = User::whereUser_division(false)->get();
        return view('user.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $posts = $user->posts()->with(['user'])->orderBy('created_at', 'desc')->paginate(10);

        return view('user.show', compact('user'),['user' => $user,'posts' => $posts]);
    }

}
