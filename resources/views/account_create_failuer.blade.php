<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/assets/css/kakeibo.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/uikit.min.css')}}">
        <script src="{{url('/assets/js/uikit.min.js')}}"></script>
        <script src="{{url('/assets/js/uikit-icons.min.js')}}"></script>
    </head>
    <body>
    <div class="uk-background-muted uk-padding uk-panel kakeibo-background">
      <div>
        <span class="uk-text-large uk-heading-bullet">アカウント作成結果</span>
      </div>
      <div>
        <p>登録失敗だぬん。</p>
        <p>idが重複してるぬん</p>
        <div class="kakeibo-regist-result-button-area">
          <button class="uk-button uk-button-default uk-button-small" onclick="location.href='{{url('/')}}'">ログイン画面へ</button>
        </div>
      </div>
      <img src="{{asset('./assets/img/kawauso_1.jpg')}}">
    </div>
    </body>
</html>
