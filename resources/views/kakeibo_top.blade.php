<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
      <div>
        <p>家計簿</p>
      </div>
      <div>
        <button type="button" onClick="location.href='{{url('/kakeibo_regist_input')}}'">登録</button>
        <button>検索</button>
      </div>
    </body>
</html>
