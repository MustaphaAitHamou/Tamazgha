@extends('layout')

@section('main') 

 <!-- main -->
 <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
          <div class="card-blog-content">
            <img src="{{asset('images/pic1.jpg')}}"alt="" />
            <p>
              2 hours ago
              <span style="float: right">Written by Tamazgha</span>
            </p>
            <h4 style="font-weight: bolder">
            <a href="{{route('journal.show')}}">Abuchiw arzagan</a>
            </h4>
          </div>

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


        <!-- pagination -->
        <div class="pagination" id="pagination">
        </div>
        </section>

        <!-- Main footer -->
        <footer class="main-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        </footer>

      </main>

@endsection