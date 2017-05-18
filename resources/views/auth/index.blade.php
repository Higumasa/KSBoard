<!--

ログイン後ユーザ画面

-->

@extends('auth')

@section('content')

<div class="page-header">
  <div class="container">
    <h2>Dashboard</h2>
  </div>
</div>

<?php $user = Auth::user() ?>

<div class="container">
  こんにちは {{ $user['name'] }} さん
  <br>
  <br>
  <br>
  <div class="pull-left">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h5>KSBoard アップデート情報</h5>
      </div>
      <div class="panel-body">
        <a class="twitter-timeline" data-lang="en" data-width="400" data-height="500" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/ks_board">Tweets by ks_board</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
  </div>
</div>


@endsection