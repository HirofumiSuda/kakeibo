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
          <p>家計簿情報修正検索</p>
        </div>
        <div>
          <form action="{{url('/kakeibo_update_input')}}" method="post">
            @csrf
            <table>
              <tr>
                <td>購入日<p style="display:inline">*</p></td>
                <td>
                  <span style="display: ruby;">
                    <input name="updateDateStart" id="updateDateStart" value="2020/03/01" autocomplete="off"></input>
                    <p>～</p>
                    <input name="updateDateEnd" id="updateDateEnd" value="2020/03/31" autocomplete="off"></input>
                  </span>
                </td>
              </tr>
            </table>
            <button type="submit">検索</button>
          </form>
          <button>クリア</button>
          <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        </div>
        <script>
           var pickerStart = new Pikaday(
           	{
           		field: document.getElementById('updateDateStart'),
           		format: 'YYYY/MM/DD',
           		defaultDate: new Date()
           	}
           );
           var pickerEnd = new Pikaday(
           	{
           		field: document.getElementById('updateDateEnd'),
           		format: 'YYYY/MM/DD',
           		defaultDate: new Date()
           	}
           );
        </script>
    </body>
</html>
