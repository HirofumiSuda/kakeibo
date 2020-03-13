<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/assets/css/pikaday.css')}}">
  <script src="{{url('./assets/js/moment.min.js')}}"></script>
  <script src="{{url('./assets/js/pikaday.js')}}"></script>
  <link rel="stylesheet" href="{{url('/assets/css/kakeibo.css')}}">
  <link rel="stylesheet" href="{{url('/assets/css/uikit.min.css')}}">
  <script src="{{url('/assets/js/uikit.min.js')}}"></script>
  <script src="{{url('/assets/js/uikit-icons.min.js')}}"></script>
</head>
<body>
  <div class="uk-background-muted uk-padding uk-panel kakeibo-background">
    <div>
      <span class="uk-text-large uk-heading-bullet">家計簿情報登録</span>
    </div>
    <div>
      <form action="{{url('/kakeibo_regist')}}" method="post">
        @csrf
        <table id="kakeibo-regist-input">
          <tr>
            <td class="uk-table-shrink"><span class="uk-label">購入日<p style="display:inline">*</p><span uk-icon="calendar"></span></span></td>
            <td><input class="uk-input uk-form-small" placeholder="2019/03/15" name="buyDate" id="buyDate" autocomplete="off"></input></td>
          </tr>
          <tr>
            <td><span class="uk-label">カテゴリ<p style="display:inline">*</p><span uk-icon="cart"></span></span></td>
            <td>
              <select class="uk-select uk-form-small" name="buyCategory">
                <option value=""></option>
                @foreach($categoryList as $category)
                <option value="{{ $category -> name }}">{{ $category -> name }}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td><span class="uk-label">商品</span></td>
            <td><input class="uk-input uk-form-small"name="buyItem" placeholder="ポテチ" autocomplete="off"></input></td>
          </tr>
          <tr>
            <td><span class="uk-label">金額<p style="display:inline">*</p><span uk-icon="credit-card"></span></span></td>
            <td><input class="uk-input uk-form-small" placeholder="1000"  name="buyPrice" autocomplete="off"></input></td>
          </tr>
          <tr>
            <td><span class="uk-label">店舗</span></td>
            <td><input  class="uk-input uk-form-small" placeholder="キュルっとショップ" name="buyShop" autocomplete="off"></input></td>
          </tr>
          <tr>
            <td><span class="uk-label">備考<span uk-icon="pencil"></span></span></td>
            <td><textarea  class="uk-input uk-form-small" name="buyRemarks"></textarea></td>
          </tr>
          <tr>
        </table>
        <button id="kakeibo-regist-button" class="uk-button uk-button-primary uk-button-small" type="submit">登録</button>
      </form>
      <div id="kakeibo-regist-footer">
        <button class="uk-button-default uk-button-small">クリア</button>
        <button class="uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
      </div>
    </div>
  </div>
  <script>
    var picker = new Pikaday({
      field: document.getElementById('buyDate'),
      position: "right",
      format: 'YYYY/MM/DD',
      defaultDate: new Date()
    });
  </script>
</body>

</html>