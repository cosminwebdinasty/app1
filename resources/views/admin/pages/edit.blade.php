@extends('components.admin-master')

	@section('content')

	<h1>Edit Page</h1>

    @csrf
    @method('POST')

    <form method="post" action="{{route('page.update', $page->id)}}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">

            <label for="title">Page title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="{{$page->title}}" >
            </div>


            <div class="form-group">

                <label for="url">URL</label>
                <input type="text" name="url" class="form-control" id="url" placeholder="{{$page->url}}" >



            <div class="form-group">

            <label for="description">Description</label>
            <textarea class="form-control" name="description"  rows="4" cols="50"  id="description" placeholder="{{$page->description}}">
            </textarea>

            <br>



            <div class="form-group">

                <label for="status">Status</label>
                <input type="checkbox" class="form-control-checkbox" name="status"  id="status" value="1" >


                <br>



                <div class="form-group">

                    <br>

                    <img witdh="100px" height="100px" src="{{asset("storage/" . $page->page_image)}}">

                    <br>


                    <label for="status">Page Title Bar Image</label>
                    <input type="file" class="form-control-file" name="page_image"  id="page_image" >


                    <br>



                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                </div>



            <button type="submit" class="btn btn-primary" cols="30" rows="50"style="margin-bottom:100px;"> Update page</button>

	@endsection
