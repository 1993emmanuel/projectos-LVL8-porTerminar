<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['auth'])->only(['store','destroy']);
    }

    public function index(){
    	// $posts = Post::get();
    	// $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(20);
        $posts = Post::latest()->with(['user','likes'])->paginate(20);
    	return view('posts.index',compact('posts'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'body'=>'required',
    	]);

    	// auth()->user()->posts()->create();

    	// $request->user()->posts()->create($request->only('body'));

    	$request->user()->posts()->create([
    		'body'=>$request->body
    	]);

    	return back();
    	// Post::create([
    	// 	'user_id'=>auth()->id(),
    	// 	'body'=>$request->body,
    	// ]);
    }

    public function show(Post $post){
        // return view('posts.show',compact('post'));
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function destroy(Post $post){
        // dd("funciona eliminar post".$post);
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }

}
