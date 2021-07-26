@extends('components.admin-master')

	@section('content')


	<h1>Create Post</h1>

    <br>
<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
	@csrf

	<div class="form-group">

		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" id="title" placeholder="Enter title" >
		</div>

		<div class="form-group">

		<label for="post_image">Post Image</label>
		<input class="form-control-file" type="file" name="post_image" class="form-control" id="post_iamge" >
		</div>


		<div class="form-group">

		<label for="exampleInputEmail"></label>
	    <textarea class="form-control" name="body"  rows="4" cols="50"  id="body">
		</textarea>

		<br>

		<button type="submit" class="btn btn-primary" cols="30" rows="50"style="margin-bottom:100px;"> Submit</button>

	@endsection
