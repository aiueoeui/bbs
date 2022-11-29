<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function create(Request $request)
    {
        //ディレクトリ名
        $dir = 'sample';

        //sampleディレクトリに画像を保存
        $request->file('image')->store('public/'. $dir);

        return redirect('/');

    }
}
