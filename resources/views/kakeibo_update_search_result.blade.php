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
      <span class="uk-text-large uk-heading-bullet">家計簿情報修正登録</span>
    </div>
    <button class="uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
    <div>
      <form action="{{url('/kakeibo_update')}}" method="post">
      @csrf
      <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover" style="width:100vw;">
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
              <input class="uk-checkbox" name="check_{{$loop->index}}" type="checkbox" value="checked"></input></td>
            <td><input class="uk-input uk-form-small kakeibo-input-buy-date" name="buy_date_{{$loop->index}}" value="{{$kakeiboInfo -> buy_date}}"></input></td>
            <td>
              <select class="uk-select uk-form-small kakeibo-input-buy-category" name="buy_category_{{$loop->index}}">
              @foreach($categoryList as $category)
              <option value="{{ $category -> name }}"
                @if (strcmp($kakeiboInfo->buy_category,$category->name) == 0)
                   {{"selected=selected"}}
                @endif
                >{{ $category -> name }}</option>
              @endforeach
              </select>
            </td>
            <td><input class="uk-input uk-form-small kakeibo-input-buy-item" name="buy_item_{{$loop->index}}" value="{{$kakeiboInfo -> buy_item}}"></input></td>
            <td><input class="uk-input uk-form-small kakeibo-input-buy-price" name="buy_price_{{$loop->index}}" value="{{$kakeiboInfo -> buy_price}}"></input></td>
            <td><input class="uk-input uk-form-small kakeibo-input-buy-shop" name="buy_shop_{{$loop->index}}" value="{{$kakeiboInfo -> buy_shop}}"></input></td>
            <td><textarea class="uk-input uk-form-small kakeibo-input-buy-remarks" name="buy_remarks_{{$loop->index}}">{{$kakeiboInfo -> buy_remarks}}</textarea></td>
            <td style="display:none;"><input type="hidden" name="kakeibo_id_{{$loop->index}}" value="{{$kakeiboInfo -> kakeibo_id}}"></input></td>
          </tr>
          @endforeach
        </table>
      </div>
      <input type="hidden" name="kakeibo_info_list_size" value={{sizeof($kakeiboInfoList)}}>
      <input type="hidden" name="updateDateStart" value="{{$searchCondition['updateDateStart']}}">
      <input type="hidden" name="updateDateEnd" value="{{$searchCondition['updateDateEnd']}}">
      <button class="uk-button uk-button-primary uk-button-small" type="submit">修正</button>
      <button class="uk-button uk-button-primary uk-button-small" type="submit" formaction="{{url('/kakeibo_delete')}}">削除</button>
      </form>
    </div>
    <div id="kakeibo-regist-footer">
     <button class="uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
    </div>
  </div>
</body>

</html>