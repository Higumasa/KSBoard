@extends('layouts.default')

@section('title')
Blog Posts
@endsection

@section('content')

<div class="page-header">
  <div class="container">
    <h2>
      Posts
    </h2>
    <a href="{{ url('/posts/create') }}" class="pull-right">
      <button type="button" class="btn btn-info">
        Add New
      </button>
    </a>
  </div>
</div>

<div class="container">
  <div class="row">

{{--
<ul>
  @foreach($posts as $post)
  <li><a href="">{{ $post->title }}</a></li>
  @endforeach
</ul>
--}}

<ul>
  @forelse($posts as $post)
  <!-- <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li> -->
  <!-- <li><a href="{{ url('/posts',$post->id) }}">{{ $post->title }}</a></li> -->
  <li>
    <h3>
      <a href="{{ action('PostsController@show',$post->id) }}">{{ $post->title }}</a>
    </h3>
    投稿日時：{{ $post->created_at }}
    <br>
    <a href="{{ action('PostsController@edit',$post->id) }}" class="fs12">
      <button type="button" class="btn btn-default btn-xs">
        Edit
      </button>
    </a>
    <form action="{{ action('PostsController@destroy' , $post->id) }}" id="form_{{ $post->id }}" method="post" style="display:inline">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);" class="fs12">
      <button type="button" class="btn btn-danger btn-xs">
        Delete
      </button>
    </a>
    </form>
  </li>
  @empty
  <li>No posts yet</li>
  @endforelse
</ul>

  </div>
</div>

<script>
function deletePost(e) {
  'use strict';

  if (confirm('Are you sure?')){
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>

@endsection
