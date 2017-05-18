@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
<div class="page-header">
  <div class="container">
    <h2>
      <a href="{{ url('/posts') }}" class="pull-right">
        <button type="button" class="btn btn-info">
          Back
        </button>
      </a>
      Edit Post
    </h2>
  </div>
</div>

<form method="post" action="{{ url('/posts', $post->id) }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  <p>
    <div class="container">
      <div class="row">
        <div class="col-xs-5">
          {!! Form::textarea('title',$post->title,['rows'=> '1', 'class'=> 'form-control']) !!}
          @if ($errors->has('title'))
          <span class="error">{{ $errors->first('title') }}</span>
          @endif
        </div>
      </div>
    </div>
  </p>

  <p>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          {!! Form::textarea('body',$post->body,['class'=>'form-control']) !!}
          @if ($errors->has('body'))
          <span class="error">{{ $errors->first('body') }}</span>
          @endif
        </div>
      </div>
    </p>
    <p>
    {!! Form::label('アップデートを局員に通知する') !!}
    {!! Form::checkbox('agree', 1, true) !!}
    </p>
    <p>
      {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </p>
  </div>
</form>
@endsection