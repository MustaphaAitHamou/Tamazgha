@extends('layout')

@section('main')

<!-- main -->
<main class="container">
  <h2 class="header-title">Tous les articles</h2>

  @if (session('status'))
  <p
    style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#5cb85c;padding:17px 0;margin-bottom:6px;">
    {{ session('status') }}</p>
  @endif 
  
  <div class="searchbar">
    <form action="">
      <input type="text" placeholder="Chercher..." name="search" />

      <button type="submit">
        <i class="fa fa-search"></i>
      </button>
    </form>
  </div>

  <div class="categories">
      <ul>
        @foreach($categories as $category)
        <li><a href="{{route('journal.index', ['category' => $category->name])}}">{{ $category->name }}</a></li>
        @endforeach
      </ul>
  </div>

  <section class="cards-blog latest-blog">


    @forelse($posts as $post)
    <div class="card-blog-content">

      @auth
      @if(auth()->user()->id === $post->user->id)
      <div class="post-buttons">
        <a href="{{route('journal.edit', $post)}}">Modifier</a>
        <form action="{{route('journal.destroy', $post)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Delete">
        </form>
      </div>
      @endif
      @endauth

      <img src="{{asset($post->imagePath)}}" alt="" />
      <p>
        {{$post->created_at->diffForHumans()}}
        <span>Written by {{$post->user->name}}</span>
      </p>
      <h4>
        <a href="{{ route('journal.show',  $post) }}">{{$post->title}}</a>
      </h4>
    </div>

  @empty
  <p>Désolé ! Actuellement aucun article ne correspond à votre recherche !</p>

    @endforelse

  </section>

  <!-- pagination --> 
  <!--<div class="pagination" id="pagination">
    <a href="">&laquo;</a>
    <a class="active" href="">1</a>
    <a href="">2</a>
    <a href="">3</a>
    <a href="">4</a>
    <a href="">5</a>
    <a href="">&raquo;</a>
  </div>-->

  <br>    
  @endsection