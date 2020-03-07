<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    </head>
    <body>
        <div>
          <p>家計簿情報登録結果</p>
        </div>
        <div>
          <p>登録成功だぬん。</p>
          <button onclick="location.href='{{url('/kakeibo_regist_input_init')}}'">登録画面</button>
          <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        </div>
        <img src="{{asset('./public/assets/img/kawauso_1.jpg')}}">
    </body>
</html>
