<!--

メールアドレス再設定画面

-->

@extends('auth')

@section('content')

<div class="page-header">
    <div class="container">
        <h2>Password Reset</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Error!</strong> パスワードをリセットできませんでした。
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
                @endif
                <div class="form-horizontal">
                  {!! Form::open(array('url' => '/password/reset/')) !!}
                  {!! Form::input('hidden','token',$token) !!}
                      <div class="form-group">
                        {!! Form::label('email', 'メールアドレス', array('class' => 'col-md-3 text-right')) !!}
                        <div class="col-md-9">
                          {!! Form::input('email','email','', array('class' => 'form-control')) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        {!! Form::label('password', 'パスワード', array('class' => 'col-md-3 text-right')) !!}
                        <div class="col-md-9">
                          {!! Form::input('password','password','', array('class' => 'form-control')) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        {!! Form::label('password_confirmation', 'パスワード確認', array('class' => 'col-md-3 text-right')) !!}
                        <div class="col-md-9">
                          {!! Form::input('password','password_confirmation','', array('class' => 'form-control')) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                          {!! Form::submit('パスワードリセット', array('class' => 'btn btn-success')) !!}
                        </div>
                      </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection