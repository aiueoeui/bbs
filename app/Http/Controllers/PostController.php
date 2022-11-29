<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::where('user_id', \Auth::user()->id)->orderBy('created_at','desc')->get();
        // $posts=Post::orderBy('exercise_date','desc')->get();
        $user=auth()->user();
        return view('post.index',compact('posts','user'));
    }

    public function adminindex()
    {
        $posts =Post::orderBy('created_at','desc')->where(function ($query){
            if ($search = request('search'))// 検索機能
            {
                $query->where('name', 'LIKE', "%{$search}%")->orWhere('exercise_name', 'LIKE', "%{$search}%")->orderBy('created_at','desc')->get();
            }
        })->paginate(15);

        $user=auth()->user();
        return view('post.adminindex',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function option()
    {
        $exercise_name = 'スクワット';
        $count = 5;

        return view('post.option',
        ['count' => $count,
         'exercise_name' => $exercise_name]);
        //viewsのpostファイルのcreate.blade.phpを表示させる
    }

    public function create()
    {
        $exercise_name = 'スクワット';
        $count = 5;

        return view('post.create',
        ['count' => $count,
         'exercise_name' => $exercise_name]);
        //viewsのpostファイルのcreate.blade.phpを表示させる
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new Post();
        $post->name=auth()->user()->name;
        $post->exercise_name=$request->exercise_name;
        $post->count=$request->count;
        $post->user_id=auth()->user()->id;
        $post->save();


        // if(request('image')){
        //ディレクトリ名
        $dir = 'sample';

        //sampleディレクトリに画像を保存
        $files =  $request->file('image');

        dd($files);

        foreach($files as $file){
        //ファイル情報保存
        $image = new Image();
        // $image->image = $file->getClientOriginalName();
        $image->image = basename($file);
        $file->store('public/image');

        $image->user_id=auth()->user()->id;
        $image->post_id= $post->id;

        $image->save();
        }

        // }


        return redirect()->route('post.index') //元の画面を表示させる return back();と同じ処理
;    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $comments = Comment::orderBy('created_at','desc')->get();
        $comments = $post->comments()->with(['user'])->orderBy('created_at','desc')->paginate(20);

        $images = $post->images()->with(['user'])->orderBy('created_at','desc')->paginate(20);

        //  $images = Image::find($id);

        return view('post.show', compact('post'),['post' => $post,'comments' => $comments, 'images' => $images,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //checkbox
    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->check = $request->check;

        $post->save();

        return back()->with('flash_message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
