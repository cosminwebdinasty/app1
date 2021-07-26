@extends('components.admin-master')

	@section('content')

	<h1>All Pages</h1>


    @if(Session::has('pagedelete'))

        <div class="alert alert-danger">{{Session::get('pagedelete')}}</div>

    @endif



    @if(Session::has('addpage'))

        <div class="alert alert-info">{{Session::get('addpage')}}</div>

    @endif






    <br>
    <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>

                  <th>Title</th>
                  <th>URL</th>
                  <th>Description</th>
                  <th>Satus</th>
                   <th>Created At</th>
                   <th>Updated At</th>
                   <th>Delete</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th>Satus</th>
                     <th>Created At</th>
                     <th>Updated At</th>
                     <th>Delete</th>


                </tr>
              </tfoot>

             <tbody>

             @foreach($pages as $page)

             <tr>
                <td>{{$page->id}}</td>
                <td><a href="{{route('page.edit', $page->id)}}">{{$page->title}}</a></td>
                <td><a href="{{route('page.show', $page->id)}}">{{$page->url}}</a></td>
                <td>{{$page->description}}</td>

                <td>
                    @if($page->status == 1)

                        Active

                    @else
                        Inactive
                        @endif


                </td>
                <td>{{$page->created_at->diffForHumans()}}</td>
                <td>{{$page->updated_at->diffForHumans()}}</td>

                <td>


                        {{-- <form method="post" action="{{route('page.destroy', $page->id)}}">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button> --}}


                    {!! Form::open(['method'=>'DELETE', 'action'=>['PageController@destroy', $page->id]]) !!}

                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}


                    {!! Form::close() !!}</td>




                </td>

             </tr>
             @endforeach
            </tbody>


             </tbody>
           </table>
         </div>
       </div>

   </div> </div>
   <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

   <div class="d-flex">
       <div class="mx-auto">
 {{-- {{$pages->links()}} --}}
</div>

@endsection



@section('scripts')

<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<!--  <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->

   @endsection
