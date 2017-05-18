<!--

ログイン後ユーザ画面

-->

@extends('auth')

@section('content')

<div class="page-header">
  <div class="container">
    <h2>メール送信完了</h2>
  </div>
</div>

<div class="container">
  入力されたメールアドレスにメールを送信しました。添付されているURLより変更処理を行ってください。
</div>

@endsection