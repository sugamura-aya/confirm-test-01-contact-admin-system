<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>お問合せフォーム</title>
  {{--リセットCSS--}}
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  {{--common.css(共通するCSSコードをまとめたCSSファイル)を呼び出し--}}
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  {{--お問合せフォームのCSSファイル呼び出し--}}
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  {{--webフォント--}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libertinus+Math&display=swap" rel="stylesheet">
</head>

<body>
    <main class="thanks">
        <div class="thanks-message">
            <p>お問い合わせありがとうございました</p>
        </div>

        <div class="thanks-button">
            <a href="/" class="home-button">HOME</a>
        </div>
    </main>

</body>

</html>