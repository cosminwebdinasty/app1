@extends('components.admin-master')

	@section('content')


	<h1>Add Page</h1>

    @csrf
    @method('POST')

    <br>


    <form method="post" action="{{route('page.add')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">

            <label for="title">Page title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" >
            </div>


            <div class="form-group">

                <label for="url">URL</label>
                <input type="text" name="url" class="form-control" id="url" placeholder="" >
                </div>




            <div class="form-group">

            <label for="description">Description</label>
            <textarea class="form-control" name="description"  rows="4" cols="50"  id="description">
            </textarea>

            <br>



            <div class="form-group">

                <label for="status">Status</label>
                <input type="checkbox" class="form-control-checkbox" name="status"   id="status" value="1">


                <br>



                <div class="form-group">

                <label for="status">Page Title Bar Image</label>
                <input type="file" class="form-control-file" name="page_image"  id="page_image" >


                <br>







            <button type="submit" class="btn btn-primary" cols="30" rows="50"style="margin-bottom:100px;"> Add page</button>



	@endsection
