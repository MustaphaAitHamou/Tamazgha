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
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
          <div class="card-blog-content">
            
          

          </div>
        </section>
      </main>
@endsection