<header id="header">
    <nav class="navbar navbar-default">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="logo" href="{{ url('/') }}">
                KSBoard
            </a>
            <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                          <li><a href="{{ url('home') }}">マイページ</a></li>
                    @endif
                    @if(Auth::check())
                          <li><a href="{{ url('posts') }}">掲示板</a></li>
                    @endif
                    @if(Auth::guest())
                          <li><a href="{{ url('auth/login') }}">ログイン<span class="sr-only">(current)</span></a></li>
                    @endif
                    @if(Auth::guest())
                          <li><a href="{{ url('auth/register') }}">サインアップ</a></li>
                    @endif
                    @if(Auth::check())
                          <li><a href="{{ url('auth/logout') }}">ログアウト</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header><!-- #header -->