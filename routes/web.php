<?php

use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Models\Comments;
use Symfony\Component\HttpFoundation\Request;

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
    $post = Posts::all();
    return view('welcome')->with('posts', $post);
});

Route::get('/post/{id}', function($id){
    $post = Posts::find($id);
    $comments = $post->comments;
    return view('page')->with('post', $post)->with('comments', $comments);
});

Route::post('/post/{id}', function(Request $request){
        $comment = new Comments;
        $comment->posts_id = $request->posts_id;
        $comment->user_name = $request->name;
        $comment->body = $request->comment;
        $comment->save();
        
        return $comment->id;
    });


Route::name('admin.')->prefix('admin')->group(function () {

    Route::get('/posts', function () {
        $post = Posts::all();
        return view('admin')->with('posts', $post);
    });

    Route::get('create', function(){
    return view('create');
    });

    Route::post('/posts', function(){
        Posts::create([
            'title'=>request('title'),
            'body'=>request('body')
        ]);
        return redirect('admin/posts');
    });

    Route::get('post/{id}', function ($id) {
        $post = Posts::find($id);
        $comments = $post->comments;
        return view('post')->with('post', $post)->with('comments', $comments);
    });

    Route::post('post/{id}', function(Request $request){
        $comment = new Comments;
        $comment->posts_id = $request->posts_id;
        $comment->user_name = $request->name;
        $comment->body = $request->comment;
        $comment->save();
        
        return $comment->id;
    });

    Route::delete('post/{id}', function(Request $request){
        Comments::destroy($request->cid);
        
        return 'deleted';
    });

});





