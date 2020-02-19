<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
        <script src="{{url('./assets/js/moment.min.js')}}"></script>
        <script src="{{url('./assets/js/pikaday.js')}}"></script>
    </head>
    <body>
        <div>
          <p>家計簿情報集計</p>
        </div>
        <div>
          <form action="{{url('/kakeibo_aggregate_result')}}" method="post">
            @csrf
            <table>
              <tr>
                <td>購入日<p style="display:inline">*</p></td>
                <td>
                  <span style="display: ruby;">
                    <input name="aggregateStart" id="aggregateDateStart" value="2020/02/15"></input>
                    <p>～</p>
                    <input name="aggregateEnd" id="aggregateDateEnd" value="2020/03/15"></input>
                  </span>
                </td>
              </tr>
            </table>
            <button type="submit">集計</button>
          </form>
          <button>クリア</button>
          <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        </div>
        <script>
           var pickerStart = new Pikaday(
           	{
           		field: document.getElementById('aggregateDateStart'),
           		format: 'YYYY/MM/DD',
           		defaultDate: new Date()
           	}
           );
        </script>
    </body>
</html>
