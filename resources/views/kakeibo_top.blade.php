<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    </head>
    <body>
        <div>
          <p>家計簿</p>
        </div>
        <div>
          <button onclick="location.href='{{url('/kakeibo_regist_input_init')}}'">登録</button>
          <button onclick="location.href='{{url('/kakeibo_aggregate')}}'">集計</button>
          <button onclick="location.href='{{url('/kakeibo_update_search')}}'">修正</button>
        </div>
    </body>
</html>
