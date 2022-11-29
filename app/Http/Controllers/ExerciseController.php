<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    //
public function index()
    {
          $records = Record::all();
        return view('exercise.record', [
            'records' => $records,]
        );
    }


public function create(Request $request)
    {
        return view('exercise.create');
    }

public function store(Request $request)
    {
        $records = new Record();
        $records->exrcise_name = $request->input('exrcise_name');
        $records->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('post.create');
        // $request->validate([
        //     'exercise_name' => ['required', 'string', 'max:255'],
        // ]);

        // Record::create([
        //     'exercise_name' => $request->exercise_name,
        // ]);

        // return redirect()->route('exercise.create');
    }
}