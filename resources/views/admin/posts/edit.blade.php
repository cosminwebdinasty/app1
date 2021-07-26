@extends('components.admin-master')

	@section('content')

	<h1>Edit post</h1>


<form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
	@csrf
	@method('POST')

	<div class="form-group">

		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{$post->title}}" >
		</div>

		<div class="form-group">


		<div><img height="300px" src="{{asset("storage/" . $post->post_image)}}" alt=""> </div>
		<label for="post_image">Post Image</label>
		<input class="form-control-file" type="file" name="post_image" class="form-control" id="post_iamge" >
		</div>


		<div class="form-group">

		<label for="exampleInputEmail">Description</label>
	    <textarea  class="form-control" name="body" value="{{$post->body}}"  placeholder="{{$post->body}}" rows="14" cols="50"  id="body"  >
		</textarea>

		<br>

		<button type="submit" class="btn btn-primary" cols="10" rows="50"style="margin-bottom:100px;"> Submit</button>

	@endsection
