@extends('components.home-master')


	@section('content')

	 <div class="container">


        <div class="col-md-12">


	   <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">  -->
		<img class="img-fluid rounded" src="{{asset('storage/' . $post->post_image)}}" alt="">
        <hr>

        <!-- Post Content -->




       {{--  <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote> --}}

        <p>{{$post->body}}</p>


        <hr>

        <!-- Comments Form -->
        {{-- <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div> --}}



        @if(Session::has('comment_flash'))

        {{session('comment_flash')}}

        @endif



@if(Auth::check())



        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">

                {!! Form::open(['method'=>'POST', 'action'=>'CommentsController@store']) !!}


                <input type="hidden" name="post_id" value="{{$post->id}}">


                    <div class="form-group">
                        {!! Form::label('body', 'Body:') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}

                    </div>


                {!! Form::close()!!}

            </div>
        </div>

@endif




        @if(count($comments) > 0)


        @foreach($comments as $comment)
        @if($comment->is_active == 1)



        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->author}}</h5>
            {{$comment->body}}
          </div>
        </div>





        {{-- @if(count($comment->replies) > 0) --}}









         @foreach($comment->replies as $reply)


         @if($reply->is_active == 1)


        {{-- nested --}}
        <div class="media mb-4" style="padding-left:40px;">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$reply->author }}</h5>
             {{$reply->body}}

            {{-- {!! Form::open(['method'=>'POST', 'action'=>['CommentRepliesController@createReply', $comment->id]]) !!}
            <input type="hidden" name="comment_id" value="{{$comment->id}}">

            <div class="form-group">
                {!! Form::label('body', 'Body' ) !!}
                {!! Form::textarea('body', null,  ['class'=>'form-control', 'rows'=>1] ) !!}
            </div>
                {!! Form::submit('Submit reply', ['class'=>'btn btn-primary'] ) !!}
            {!! Form::close() !!} --}}
        </div>
      </div>
            {{--end nested --}}


      @endif


      @endforeach

      {{-- @endif --}}



      @if(Session::has('reply_flash'))

      {{session('reply_flash')}}

      @endif

      <button onclick="myFunction()" style="float:right;" class="toggle-reply btn btn-primary mb-3" id="repbtn">Reply</button>

      <div id="comment" class="comment-reply" style="padding-left:40px !important;">




      {!! Form::open(['method'=>'POST', 'action'=>['CommentRepliesController@createReply', $comment->id]]) !!}
      <input type="hidden" name="comment_id" value="{{$comment->id}}">

      <div class="form-group">
          {!! Form::label('body', 'Reply' ) !!}
          {!! Form::textarea('body', null,  ['class'=>'form-control', 'rows'=>1] ) !!}
      </div>
          {!! Form::submit('Submit reply', ['class'=>'btn btn-primary'] ) !!}
      {!! Form::close() !!} <br><br>
      </div>



@endif
@endforeach


@endif



<script>

function myFunction() {
var x = document.getElementById("comment");


if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }


}
</script>







        <!-- Comment with nested comments -->
       {{--  <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> --}}

	</div>
	</div>






		@endsection








