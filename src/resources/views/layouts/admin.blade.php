<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', '管理画面')</title>
  {{--リセットCSS--}}
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  {{--common.css(共通するCSSコードをまとめたCSSファイル)を呼び出し--}}
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  {{--管理者用システムのCSSファイル呼び出し--}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">{{--ページネーションの表示調整のため導入--}}
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  {{--webフォント--}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libertinus+Math&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">Fashionably Late</div>

        <nav class="header__nav">
            {{--ルートに名前を付けて利用できるようにすること--}}
            @if (Route::currentRouteName() === 'login')
                <a class="nav__item" href="{{ route('register') }}">Register</a>
            @elseif (Route::currentRouteName() === 'register')
                <a class="nav__item" href="{{ route('login') }}">Login</a>
            @elseif (Auth::check())
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button class="nav__item" type="submit">Logout</button>
                </form>
            @endif
        </nav>

    </header>

    <main class="login">
    {{--各ページに @yield ディレクティブを記述--}}
    @yield('content')
    </main>

    {{--index.blade.php に記述した @section('scripts')を埋め込む場所として、下記を記述--}}
    @yield('scripts')


</body>

</html>