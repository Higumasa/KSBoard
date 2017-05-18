@extends('layouts.default')

@section('title','Blog Detail')

@section('content')

<div class="page-header">
  <div class="container">
    <h2>
      <a href="{{ url('/posts') }}" class="pull-right">
        <button type="button" class="btn btn-info">
          Back
        </button>
      </a>
      {{ $post->title }}
    </h2>
  </div>
</div>
<div class="well well-lg">
  <p>{!! nl2br(e($post->body)) !!}</p>
</div>

<div class="container">
  <div class="row">

  <br><br>
  <h4>Comments</h4>

  <ul>
  @forelse($post->comments as $comment)
    <li>
    <h6>{!! nl2br(e($comment->body)) !!}</h6>
      <form action="{{ action('CommentsController@destroy' , [$post->id , $comment->id]) }}" id="form_{{ $comment->id }}" method="post" style="display:inline">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <a href="#" data-id="{{ $comment->id }}" onclick="deleteComment(this);" class="fs12">
        <button type="button" class="btn btn-danger btn-xs">
          Delete
        </button>
      </a>
      </form>
    </li>
    @empty
    <li>No comment yet</li>
  @endforelse
  </ul>

  <h4>Add New Comments</h4>

  <form method="post" action="{{ action('CommentsController@store' , $post->id) }}">
    {{ csrf_field() }}
    <p>
      <div class="col-xs-6">
        {!! Form::textarea('body',$name,['class'=>'form-control' , 'rows'=> '3' , 'placeholder'=>'ここにコメントを入力してください']) !!}
        @if ($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
        @endif
      </div>
    </p>
    <br>
    <p>
      {!! Form::submit('Add Comment', ['class' => 'btn btn-primary']) !!}
    </p>
  </form>

  </div>
</div>

<script>
function deleteComment(e) {
  'use strict';

  if (confirm('are you sure?')){
    document.getElementById('form_' + e.dataset.id).submit();
  }
}

</script>

@endsection
