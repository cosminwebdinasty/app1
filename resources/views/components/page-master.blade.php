<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

<link rel="stylesheet"  href="{{asset('css/blog-home.css')}}">
  <link rel="stylesheet"  href="{{asset('css/blog-post.css')}}">
  <link rel="stylesheet"  href="{{asset('css/app.css')}}">
  <link rel="stylesheet"  href="{{asset('css/sb-admin-2.css')}}">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>



        </div></div>

  </nav>




          <div class="row">

                <div style="background-image:url('{{asset("storage/" . $page->page_image)}}'); background-repeat: no-repeat; background-size: cover; background-position: center; height:350px; display:flex; justify-content:center; align-items:center; margin-bottom: 80px;" class="container-fluid">

                <h1>{{$page->title}}</h1>

            </div>


            <div class="container">



                <h3> Description </h3>


                <p style="font-size:24px;"> {{$page->description}} </p>



                <p> Created at - {{$page->created_at->diffForHumans()}}</p>
                <p> Updated at - {{$page->updated_at->diffForHumans()}}</p>


            </div>
