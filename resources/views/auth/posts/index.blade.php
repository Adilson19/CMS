@extends('layouts.auth')

@section('styles')
{{-- Link que nos possibilita ter acesso a diversos itens de design da internet para o nosso site --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  {{--  Para tratar os dados --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Posts </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Posts</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                    {{-- Condicional do Numero de posts --}}
                    @if (count($posts) > 0 )
                  <h4 class="card-title">Posts</h4>
                  </p>


                  <table id="posts-table" class="table table-striped">
                    <thead>
                      <tr>
                        <th> Image </th>
                        <th> Title </th>
                        <th>Category</th>
                        <th> Description </th>
                        <th> Status </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $post->gallery }}" style="width: 90px" alt="image" />
                          </td>
                          <td> {{ $post->title }} </td>
                          <td>
                            {{ Str::limit($post->description, 15, '...') }}</div>
                          </td>
                          <td> {{ $post->category->name }} </td>
                          <td> {{ $post->is_publish == 1 ? 'Published' : 'Draft'}}</td>
                          <td>

                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
                            <a href="" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
                            <a href="" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </a>

                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  @else
                   <h3 class="text-center text-danger">No posts found </h3>
                  @endif

                </div>
              </div>
            </div>
            
          </div>
        </div>
@endsection
{{-- Para colocar os dados na tabela rolante --}}
@section('scripts')
  <script rel="stylesheet" type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function()
    {
      $('#posts-table').DataTable();
    });
  </script>
@endsection