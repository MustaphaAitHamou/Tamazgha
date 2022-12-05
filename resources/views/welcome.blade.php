@extends('layout')

@section('header')
<!-- header -->
<header class="header" style=" background-image: url({{asset('images/tamazgha_banner.jpg')}});">
  <div class="header-text">
    <h1>Tamazgha</h1>
    <h4>L'actualité du monde Berbère</h4>
  </div>
  <div class="overlay"></div>
</header>
@endsection

@section('main')

<!-- main -->
<main class="container">
  <h2 class="header-title">Derniers articles</h2>
  <section class="cards-blog latest-blog">

      @foreach($posts as $post)
      <div class="card-blog-content">
        <img src="{{asset($post->imagePath)}}" alt="" />
        <p>
          {{$post->created_at->diffForHumans()}}
          <span>Written By {{$post->user->name}}</span>
        </p>
        <h4>
          <a href="{{route('journal.show', $post)}}">{{$post->title}}</a>
        </h4>
      </div>
      @endforeach
  </section>
</main>
@endsection