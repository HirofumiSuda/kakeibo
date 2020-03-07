<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets/css/pikaday.css')}}">
  <script src="{{url('./assets/js/moment.min.js')}}"></script>
  <script src="{{url('./assets/js/pikaday.js')}}"></script>
</head>

<body>
  <div>
    <p>家計簿</p>
  </div>
  <div>
    <form action="{{url('/kakeibo_regist')}}" method="post">
      @csrf
      <table>
        <tr>
          <td>購入日<p style="display:inline">*</p>
          </td>
          <td><input name="buyDate" id="buyDate" autocomplete="off"></input></td>
        </tr>
        <tr>
          <td>カテゴリ<p style="display:inline">*</p>
          </td>
          <td>
            <select name="buyCategory">
              <option value=""></option>
              @foreach($categoryList as $category)
              <option value="{{ $category -> name }}">{{ $category -> name }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td>商品</td>
          <td><input name="buyItem"></input></td>
        </tr>
        <tr>
          <td>金額<p style="display:inline">*</p>
          </td>
          <td><input name="buyPrice"></input></td>
        </tr>
        <tr>
          <td>店舗</td>
          <td><input name="buyShop"></input></td>
        </tr>
        <tr>
          <td>備考</td>
          <td><textarea name="buyRemarks"></textarea></td>
        </tr>
        <tr>
      </table>
      <button type="submit">登録</button>
    </form>
    <button>クリア</button>
    <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
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