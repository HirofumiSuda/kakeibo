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
          <span class="uk-text-large uk-heading-bullet">家計簿情報修正</span>
        </div>
        <div id="kakeibo-update-search">
          <form action="{{url('/kakeibo_update_input')}}" method="post">
            @csrf
            <table>
              <tr>
                <td style="width:100px;" class="uk-table-shrink uk-padding-remove"><span class="uk-label">購入日<p style="display:inline">*</p><span uk-icon="calendar"></span></span></td>
                <td>
                  <div style="display:flex;">
                    <input class="uk-input uk-form-small" style="width:110px;" name="updateDateStart" id="updateDateStart" value="2020/03/01" autocomplete="off"></input>
                    ～
                    <input class="uk-input uk-form-small" style="width:110px;" name="updateDateEnd" id="updateDateEnd" value="2020/03/31" autocomplete="off"></input>
                  </div>
                </td>
              </tr>
            </table>
            <button class="uk-button uk-button-primary uk-button-small" type="submit">検索</button>
          </form>
          <div style="margin-top:5px;">
            <button class="uk-button-default uk-button-small">クリア</button>
            <button class="uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
          </div>
        </div>
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
