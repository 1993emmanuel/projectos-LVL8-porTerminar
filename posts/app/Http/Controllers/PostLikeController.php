<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Mail;
use App\Mail\PostLiked;

class PostLikeController extends Controller
{
    //

	public function __construct(){
		$this->middleware(['auth']);
	}

    public function store(Post $post, Request $request){
    	// $post = Post::find($post)
    	// dd($post->likes()->withTrashed()->get());

    	// dd($post->likedBy($request->user())); // al mostrar true nos dice que el usuario ya dio un like
    	if ($post->likedBy($request->user())){
    		return response(null,409); //regresamos un conficlto http
    	}

    	$post->likes()->create(['user_id'=>$request->user()->id]);

        //le pasamos dos parametros para asi poder trabajar mejor primero el auth->user y el post para llenar con esa info el mail
        if(!$post->likes()->onlyTrashed()->where('user_id',$request->user()->id)->count() ){
            Mail::to($post->user)->send(new PostLiked(auth()->user(),$post));
        }
    	return back();
    }

    public function destroy(Post $post , Request $request){
    	// dd($post);
    	$request->user()->likes()->where('post_id',$post->id)->delete();
    	return back();
    }

}
