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
          <p>集計失敗だぬん。</p>
          <p>{!! $message !!}</p>
          <button onclick="location.href='{{url('/kakeibo_aggregate')}}'">集計画面</button>
          <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        </div>
    </body>
</html>
