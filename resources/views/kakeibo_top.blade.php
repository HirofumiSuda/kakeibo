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
            <span class="uk-text-large uk-heading-bullet">家計簿管理</span>
          </div>
          <div>
            <button class="uk-button uk-button-primary uk-button-small" onclick="location.href='{{url('/kakeibo_regist_input_init')}}'">登録</button>
            <button class="uk-button uk-button-primary uk-button-small" onclick="location.href='{{url('/kakeibo_aggregate')}}'">集計</button>
            <button class="uk-button uk-button-primary uk-button-small" onclick="location.href='{{url('/kakeibo_update_search')}}'">修正</button>
          </div>
        </div>
    </body>
</html>
