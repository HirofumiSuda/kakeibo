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
    <p>家計簿修正</p>
  </div>
  <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
  <div>
    <form action="{{url('/kakeibo_update')}}" method="post">
    @csrf
    <table class="table table-sm table-hover">
      <tr>
        <th scope="col">#</th>
        <th scope="col">購入日</th>
        <th scope="col">カテゴリ</th>
        <th scope="col">商品</th>
        <th scope="col">金額</th>
        <th scope="col">店舗</th>
        <th scope="col">備考</th>
      </tr>
      @foreach ($kakeiboInfoList as $kakeiboInfo)
      <tr>
        <td>
          <input name="check_{{$loop->index}}" type="hidden" value="uncheck">
          <input name="check_{{$loop->index}}" type="checkbox" value="checked"></input></td>
        <td><input name="buy_date_{{$loop->index}}" value="{{$kakeiboInfo -> buy_date}}"></input></td>
        <td>
          <select name="buy_category_{{$loop->index}}">
          @foreach($categoryList as $category)
          <option value="{{ $category -> name }}"
            @if (strcmp($kakeiboInfo->buy_category,$category->name) == 0)
               {{"selected=selected"}}
            @endif
            >{{ $category -> name }}</option>
          @endforeach
          </select>
        </td>
        <td><input name="buy_item_{{$loop->index}}" value="{{$kakeiboInfo -> buy_item}}"></input></td>
        <td><input name="buy_price_{{$loop->index}}" value="{{$kakeiboInfo -> buy_price}}"></input></td>
        <td><input name="buy_shop_{{$loop->index}}" value="{{$kakeiboInfo -> buy_shop}}"></input></td>
        <td><input name="buy_remarks_{{$loop->index}}" value="{{$kakeiboInfo -> buy_remarks}}"></input></td>
        <td style="display:none;"><input type="hidden" name="kakeibo_id_{{$loop->index}}" value="{{$kakeiboInfo -> kakeibo_id}}"></input></td>
      </tr>
      @endforeach
    </table>
    <input type="hidden" name="kakeibo_info_list_size" value={{sizeof($kakeiboInfoList)}}>
    <input type="hidden" name="updateDateStart" value="{{$searchCondition['updateDateStart']}}">
    <input type="hidden" name="updateDateEnd" value="{{$searchCondition['updateDateEnd']}}">
    <button type="submit">修正</button>
    <button type="submit" formaction="{{url('/kakeibo_delete')}}">削除</button>
    </form>
  </div>
  <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
</body>

</html>