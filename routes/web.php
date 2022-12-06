<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/squat', [PostController::class, 'send'])->name('squat');
Route::view('/form', 'test');

//ユーザ一覧


//記録一覧
Route::resource('post', PostController::class);
Route::post('post/create', [PostController::class,'create'])->name('post.create');

// Route::get('post', [PostController::class,'index'])->name('post.index');
// Route::get('option', [PostController::class,'option'])->name('post.option');
// Route::get('post/create', [PostController::class,'create'])->name('post.create');
// Route::post('post', [PostController::class,'store'])->name('post.store');
// Route::get('show', [PostController::class,'show'])->name('post.show');

//コメント
Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/menu', function () {
    return view('menu');
})->middleware(['auth', 'verified'])->name('menu');

Route::get('/squat', function () {
    return view('squat');
})->middleware(['auth', 'verified'])->name('squat');

Route::get('/squat/squat_menu', function () {
    return view('exercise.squat_menu');
})->middleware(['auth', 'verified'])->name('exercise.squat_menu');

//画像
Route::get('/images',[ImageController::class,'index'])->name('images.index');
Route::get('create', [ImageController::class,'create'])->name('images.create');

// Route::get('/exercise', [ExerciseController::class, 'index'])->name('exercise');

// Route::get('/exercise/create', [ExerciseController::class, 'create'])->name('exercise.create');

// Route::post('/exercise/create', [ExerciseController::class, 'create'])->name('exercise.store');

// Route::get('/input', 'PostController@input')->name('input');
// Route::post('/check_register', 'PostController@register')->name('check.register');
// Route::get('/output', 'PostController@output')->name('output');


// admin以下は管理者のみアクセス可
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {
    Route::get('/dashboard', function () {
        return view('admindashboard');
    });

    Route::get('post', [PostController::class, 'adminindex'])->name('post.adminindex');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}/posts', [UserController::class, 'show'])->name('user.show');
    Route::post('/check_register', [UserController::class, 'register'])->name('user.register');
});
