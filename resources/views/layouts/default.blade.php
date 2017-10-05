<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="icon" href="css/ksboard_icon.ico">
</head>
<body>
  <div id="page">
    @include('auth.header')

    @if (session('flash_message'))
    <div class="flash_message" onclick="this.classList.add('hidden')">
      <div class="alert alert-success">
        <div class="text-center">
          {{ Session::get('flash_message') }}
        </div>
      </div>
    </div>
    @endif

    <div class="container">
    @yield('content')
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>