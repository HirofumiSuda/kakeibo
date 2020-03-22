<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{url('./assets/js/Chart.min.js')}}"></script>
        <script src="{{url('./assets/js/chartjs-plugin-colorschemes.min.js')}}"></script>
        <link rel="stylesheet" href="{{url('/assets/css/kakeibo.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/uikit.min.css')}}">
        <script src="{{url('/assets/js/uikit.min.js')}}"></script>
        <script src="{{url('/assets/js/uikit-icons.min.js')}}"></script>
    </head>
    <body>
      <div class="uk-background-muted uk-padding uk-panel kakeibo-background">
        <div>
          <span class="uk-text-large uk-heading-bullet">家計簿情報削除結果</span>
        </div>
        <p>消しといたぬん。</p>
        <form action="{{url('/kakeibo_update_input')}}" method="post">
           @csrf
           <input type="hidden" name="updateDateStart" value="{{$searchCondition['updateDateStart']}}">
           <input type="hidden" name="updateDateEnd" value="{{$searchCondition['updateDateEnd']}}">
           <button class="uk-button-primary uk-button-small" type="submit">修正画面へ戻る</button>
        </form>
        <div>
        <div class="uk-overflow-auto">
          <table class="uk-table uk-table-hover" style="width:100vw;">
            <tr>
              <th scope="col">購入日</th>
              <th scope="col">カテゴリ</th>
              <th scope="col">商品</th>
              <th scope="col">金額</th>
              <th scope="col">店舗</th>
              <th scope="col">備考</th>
            </tr>
            @foreach ($resultList as $result)
            <tr>
              <td class="kakeibo-input-buy-date">{{$result['buyDate']}}</td>
              <td class="kakeibo-input-buy-category">{{$result['buyCategory']}}</td>
              <td class="kakeibo-input-buy-item">{{$result['buyItem']}}</td>
              <td class="kakeibo-input-buy-price">{{$result['buyPrice']}}</td>
              <td class="kakeibo-input-buy-shop">{{$result['buyShop']}}</td>
              <td class="kakeibo-input-buy-remarks">{{$result['buyRemarks']}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <div style="margin-top:5px;">
          <button class="uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        </div>
      </div>
    </body>
</html>
