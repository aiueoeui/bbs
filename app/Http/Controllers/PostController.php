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
        return view('Post.index',compact('posts','user'));
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
        return view('Post.adminindex',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function option()
    {
        // $exercise_name = 'スクワット';
        // $count = 5;

        return view('post.option',
        ['count' => $count,
        'badcount' => $badcount,
         'exercise_name' => $exercise_name]);
        //viewsのpostファイルのcreate.blade.phpを表示させる
    }

    public function create(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        $badcount = $request->input('badcount');


        return view('Post.create',
        ['count' => $count,
        'badcount' => $badcount,
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
        $post->badcount=$request->badcount;
        $post->user_id=auth()->user()->id;
        $post->save();


        if(request('image')){
        //ディレクトリ名
        $dir = 'sample';

        //sampleディレクトリに画像を保存
        $file =  $request->file('image')->store('public/images/');

        // dd($file);

        //ファイル情報保存(1枚のみ)
        $image = new Image();
        // $image->image = $file->getClientOriginalName();
        $image->image = basename($file);
        // $file->store('public/image');

        $image->user_id=auth()->user()->id;
        $image->post_id= $post->id;

        $image->save();
        }

        // foreach($files as $file){
        // //ファイル情報保存
        // $file = new Image();
        // // // $image->image = $file->getClientOriginalName();
        // // $image->image = basename($file);
        // $path = $request->$file->store('public/images');

        // $image->user_id=auth()->user()->id;
        // $image->post_id= $post->id;

        // $image->save();
    //     }
    // }

        return redirect()->route('post.index');  //元の画面を表示させる return back();と同じ処理
  }

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

        return view('Post.show', compact('post'),['post' => $post,'comments' => $comments, 'images' => $images,]);
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

    // app/Http/Controllers/TestController.php

    public function send(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('squat', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function stepupsend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('step_up', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function dumbbellsend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('dumbbell', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function push_upsend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('push_up', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function sit_upsend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('sit_up', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function karadanoyokosend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('karadanoyoko', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function kataashisend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('kataashi', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

    public function kubisend(Request $request)
    {
        $exercise_name = $request->input('exercise_name');
        $count = $request->input('count');
        // echo "回数は、" . $count ."運動名は".$exercise_name."です。";

        return view('kubi', compact('count'),['count' => $count, 'exercise_name' => $exercise_name]);
    }

}
