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
        <p>家計簿登録</p>
      </div>
      <div>
        <form action=""/kakeiboRegist"" method=""POST"">
          <table>
            <tr>
              <td>購入日<td>
              <td><input></input><td>
            </tr>
            <tr>
              <td>カテゴリ<td>
              <td><input></input><td>
            </tr>
            <tr>
              <td>金額<td>
              <td><input></input><td>
            </tr>
            <tr>
              <td>購入店舗<td>
              <td><input></input><td>
            </tr>
            <tr>
              <td>備考<td>
              <td><textarea></textarea><td>
            </tr>
            </tr>
          </table>
        </form>
        <button>Topへ</button>
        <button>クリア</button>
        <button>登録</button>
      </div>
    </body>
</html>
