<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{url('./assets/js/Chart.min.js')}}"></script>
        <script src="{{url('./assets/js/chartjs-plugin-colorschemes.min.js')}}"></script>
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    </head>
    <body>
        <div>
          <p>家計簿修正結果</p>
        </div>
        <p>消しといたぬん。</p>
        <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        <form action="{{url('/kakeibo_update_input')}}" method="post">
           @csrf
           <input type="hidden" name="updateDateStart" value="{{$searchCondition['updateDateStart']}}">
           <input type="hidden" name="updateDateEnd" value="{{$searchCondition['updateDateEnd']}}">
           <button type="submit">修正画面へ戻る</button>
        </form>
        <div>
        <div>
          <table class="table table-sm table-hover">
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
              <td>{{$result['buyDate']}}</td>
              <td>{{$result['buyCategory']}}</td>
              <td>{{$result['buyItem']}}</td>
              <td>{{$result['buyPrice']}}</td>
              <td>{{$result['buyShop']}}</td>
              <td>{{$result['buyRemarks']}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
    </body>
</html>
