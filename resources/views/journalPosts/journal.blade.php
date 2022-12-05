@extends('layout')

@section('main') 

 <!-- main -->
 <main class="container">
        <h2 class="header-title">Tous les articles</h2>

      @include('includes.flash-message')
      <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Chercher..." name="search"/>

          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>

      
        <section class="cards-blog latest-blog">
          

         @foreach($posts as $post)
          <div class="card-blog-content">
            <img src="{{asset($post->imagePath)}}" alt=""/>
            <p>
                {{$post->created_at->diffForHumans()}}
                <span>Written by {{$post->user->name}}</span>
            </p>
            <h4>
              <a href="{{ route('journal.show',  $post) }}">{{$post->title}}</a>
            </h4>
          </div>
         @endforeach

        </section>

 <!-- pagination -->
 <div class="pagination" id="pagination">
  <a href="">&laquo;</a>
  <a class="active" href="">1</a>
  <a href="">2</a>
  <a href="">3</a>
  <a href="">4</a>
  <a href="">5</a>
  <a href="">&raquo;</a>
        </div>

        <br>

@endsection