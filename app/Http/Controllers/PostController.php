<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Comment;
use App\CommentReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //



	public function index(){


		 // $posts = Post::all();

		 $posts = auth()->user()->posts()->paginate(4);  //Current user posts


         $comments = Comment::all();



		return view('admin.posts.index', ['posts'=>$posts, 'comments'=>$comments]);
	}





	public function search(Request $request){


		$search = $request->input('search');

		 $posts = Post::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('body', 'LIKE', "%{$search}%")
        ->get();

		return view('search', compact('posts'));
	}




	public function show(Post $post){

        $categories = Category::all();

        /* $comments = Comment::all(); */


        $comments = Comment::where("post_id", "=", $post->id)->get();


		return view('blog-post', ['post' => $post, 'categories'=>$categories, 'comments'=>$comments]);

	}



	public function create(){


		return view('admin.posts.create');

	}

	public function store(){

		$this->authorize('create', Post::class);

		$inputs = request()->validate([

		'title' => 'required',
		'post_image' => 'file',
		'body' => 'required',

		]);


		 if(request('post_image')){


			 $inputs['post_image'] = request('post_image')->store('images', 'public');
			 }


		//dd($inputs);

		auth()->user()->posts()->create($inputs);


		//Session::flash('postmessage', 'Post was created');

		session()->flash('postmessage','You created the post: ' .$inputs['title']);

		return redirect()->route('post.index');

	}


	public function edit(Post $post){


		// $this->authorize('view', $post);


		if(auth()->user()->can('view', $post))

		return view('admin.posts.edit', ['post'=>$post]);

	}




	public function update(Post $post){


		$inputs = request()->validate([

		'title' => 'required',
		'post_image' => 'file',
		'body' => 'required',

		]);


		 if(request('post_image')){

					 $inputs['post_image'] = request('post_image')->store('images');
					 $post->post_image = $inputs['post_image'];
			 }

			$post->title = $inputs['title'];
			$post->body = $inputs['body'];


			$this->authorize('update', $post);

			$post->save();

		// auth()->user()->posts()->save($post);

		session()->flash('postupdate','You updated the post: ' .$inputs['title']);

		return redirect()->route('post.index');
	}











	public function destroy(Post $post){


		$this->authorize('delete', $post);

		$post->delete();

		Session::flash('message', 'Post was deleted');

		return back();



	}






    public function test($id){

        $post = Post::findOrFail($id);

    //     $comments = $post->comments()->whereIsActive(1)->get();

        $comments = Comment::where("post_id", "=", $post->id)->get();

        return view('blog-post', compact('post', 'comments'));


    }







}
