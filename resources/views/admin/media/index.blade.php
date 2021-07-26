@extends('components.admin-master')


@section('content')

<h1>Media</h1>





@if(session()->has('photodelete'))
			<div class="alert alert-danger">
			{{session('photodelete')}}
		</div>
	@endif






@if($photos)


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created At</th>
           <th>Delete</th>

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created At</th>
          <th>Delete</th>

        </tr>
      </tfoot>
                @foreach ($photos as $photo)


     <tbody>
        <tr>
            <td>{{$photo->id}}</td>

            <td><img height="50px" src="{{asset('images/' .$photo->file)}}">

            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no_date'}}</td>




               {{--  <td><form method="post" action="{{route('photo.destroy', $photo->id)}}">

                    @csrf
                    @method('DELETE')


                    <button type="submit" class="btn btn-danger">Delete</button>


                    </form> </td> --}}

                        <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id]]) !!}

                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}


                    {!! Form::close() !!}</td>

        </tr>

       @endforeach
    </tbody>


</tbody>
</table>
</div>



<!-- /.container-fluid -->


<!-- End of Main Content -->


@endif

@endsection
