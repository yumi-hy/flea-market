<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flea market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <img src="{{ asset('img/logo.svg') }}" alt="coachtech">
        <nav>
          <ul class="header-nav">
            @if (Auth::check())
            <li class="header-nav__item">
              <form class="search-form" action="/search" method="get">
                <input type="text" name="query" class="search-input" placeholder="なにをお探しですか？">
              </form>
            </li>
            <li class="header-nav__item">
              <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
              </form>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/mypage">マイページ</a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/sell">出品</a>
            </li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>