
@extends('components.admin-master')

	@section('content')


	<h1>Search results</h1>







        <div class="post-list">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
					  <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>


                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
					  <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>



                    </tr>
                  </tfoot>
                 @if($posts->isNotEmpty())
    @foreach ($posts as $post)
				 <tbody>
				  <tr>
					<td> {{$post->id}}</td>
					<td> {{$post->user->name}}</td>
					<td><a href="{{route('post.edit', $post->id)}}"> {{$post->title}}</a></td>
				 <td> <img height="40px" src="{{asset('storage/' . $post->post_image)}}" alt=""></td>
					<td> {{$post->created_at ->diffForHumans()}}</td>
					<td> {{$post->updated_at ->diffForHumans()}}</td>


				 </tr>




        </div>
    @endforeach
@else
    <div>
        <h2>No posts found</h2>
    </div>
@endif



@endsection
