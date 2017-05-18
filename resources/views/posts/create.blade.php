@extends('layouts.default')

@section('title','Add New')

@section('content')

<div class="page-header">
  <div class="container">
    <h2>
      <a href="{{ url('/posts') }}" class="pull-right">
      <button type="button" class="btn btn-info">
        Back
      </button>
      </a>
      Add New
    </h2>
  </div>
</div>


<form method="post" action="{{ url('/posts') }}">
  {{ csrf_field() }}
  <p>
  <div class="container">
    <div class="row">
      <div class="col-xs-5">
    Title
    {!! Form::textarea('title',null,['rows'=> '1', 'class'=> 'form-control' , 'placeholder'=>'ここにタイトルを入力してください']) !!}
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
        Body
        {!! Form::textarea('body',null,['class'=>'form-control' , 'placeholder'=>'ここに本文を入力してください']) !!}
        @if ($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
        @endif
      </div>
    </div>
  </p>
  <p>
    {!! Form::submit('Add New', ['class' => 'btn btn-primary' , 'onclick'=>'return createPost(this)']) !!}
  </p>
  </div>
</form>

<script>
function createPost(e) {
  'use strict';

  var myret = 'Are you sure you want to post?';
  if(confirm(myret)){
    document.getElementById('form_' + e.dataset.id).submit();
    return true;
  }else{
    return false;
  }
}
</script>

@endsection