@extends('layouts.website')

@section('content')
<section class="page-title bg-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block">
            <h1>Blog Right Sidebar</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <div class="page-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">

                @if (count($posts) > 0)
                  
                
                @foreach ($posts as $post)
                  <div class="post">
                  <div class="post-media post-thumb">
                    <a href="{{ route('website.posts.show', $post->id) }}">
                      <img src="{{ $post->gallery->image }}" style="width:100%;">
                    </a>
                  </div>
                  <h3 class="post-title"><a href="#">{{ $post->title }}</a></h3>
                  <div class="post-meta">
                    <ul>
                      <li>
                        <i class="ion-calendar"></i> {{ date('d M Y', strtotime($post->created_at)) }}
                      </li>
                      <li>
                        <a href="#"><i class="ion-pricetags"></i> {{ $post->category->name }} </a>
                      </li>
                
                    </ul>
                  </div>
                  <div class="post-content">
                    <p>{!! Str::limit($post->description, 200) !!}</p>
                    <a href="{{ route('website.posts.show', $post->id) }}" class="btn btn-main">Continue Reading</a>
                  </div>
                  </div>
                @endforeach
                @else 
                <h2 class="text-center text-danger mt-5">No post added yet</h2>
                @endif
  
                {{--<nav aria-label="Page navigation example">
                  <ul class="pagination post-pagination">
                    <li class="page-item"><a class="page-link" href="blog-grid.html">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="blog-grid.html">1</a></li>
                    <li class="page-item"><a class="page-link" href="blog-grid.html">2</a></li>
                    <li class="page-item"><a class="page-link" href="blog-grid.html">3</a></li>
                    <li class="page-item"><a class="page-link" href="blog-grid.html">Next</a></li>
                  </ul>
                </nav>--}} 
                {{ $posts->links() }}
                  </div>
                  <div class="col-lg-4">
                      <div class="pl-0 pl-xl-4">
                          <aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
      <!-- Widget Latest Posts -->
      <div class="widget widget-latest-post">
          <h4 class="widget-title">Latest Posts</h4>
          
            @if (count ($latestPosts) > 0)
                  @foreach ($latestPosts as $post)
                  <div class="media">
                      <a class="pull-left" href="{{ route('website.posts.show', $post->id) }}">
                          <img class="media-object" src="{{ $post->gallery->image }}" style="width:50px" alt="Image">
                      </a> 
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('website.posts.show',  $post->id) }}">{{ $post->title }}</a></h4>
                        <p>{!! Str::limit($post->description, 25) !!}</p>
                      </div>
                  </div>
                  @endforeach
            @else
            <h6 class="text-center text-danger">No post added yet</h6>
            @endif
      </div>
      <!-- End Latest Posts -->
  
      <!-- Widget Category -->
      <div class="widget widget-category">
          <h4 class="widget-title">Categories</h4>
          @if (count($categories) > 0)
          <ul>
            @foreach ($categories as $category)
              <li><a href="blog-grid.html">{{ $category->name }}</a></li>
            @endforeach ($categoriess as $category)
          </ul>
            @endfor
          @else
            <h6 class="text-center text-danger" style="text-decoration: none">No category added yet</h6>
          @endif
      </div> <!-- End category  -->
  </aside>
                      </div>
                  </div>
          </div>
      </div>
  </div>
@endsection