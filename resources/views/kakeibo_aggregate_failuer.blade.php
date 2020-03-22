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
          <span class="uk-text-large uk-heading-bullet">家計簿情報集計結果</span>
        </div>
        <div>
          <p>集計失敗だぬん。</p>
          <p>{!! $message !!}</p>
          <button class="uk-button uk-button-primary uk-button-small" onclick="location.href='{{url('/kakeibo_aggregate')}}'">集計画面</button>
          <button class="uk-button uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        </div>
      </div>
    </body>
</html>
