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
          <span class="uk-text-large uk-heading-bullet">家計簿情報集計結果</span>
        </div>
        <button class="uk-button uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
        <div>
          <canvas id="kakeiboChart" height="200" witdh="200"></canvas>
          <span class="uk-text-small uk-heading-bullet">集計一覧</span>
          <table class="uk-table uk-table-striped">
            <tr>
              <th scope="col">カテゴリ</th>
              <th scope="col">金額</th>
            </tr>
            @foreach ($kakeiboInfoGroupByCategoryList as $kakeiboInfoGroupByCategory)
            <tr>
              <td id="cateboryAggregate_{{$loop->index}}">{{$kakeiboInfoGroupByCategory -> buy_category}}</td>
              <td id="priceAggregate_{{$loop->index}}">{{$kakeiboInfoGroupByCategory -> sum_price}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <div>
          <span class="uk-text-small uk-heading-bullet">全データ</span>
          <table class="uk-table uk-table-striped">
            <tr>
              <th scope="col">購入日</th>
              <th scope="col">カテゴリ</th>
              <th scope="col">商品</th>
              <th scope="col">金額</th>
              <th scope="col">店舗</th>
              <th scope="col">備考</th>
            </tr>
            @foreach ($kakeiboInfoList as $kakeiboInfo)
            <tr>
              <td>{{$kakeiboInfo -> buy_date}}</td>
              <td>{{$kakeiboInfo -> buy_category}}</td>
              <td>{{$kakeiboInfo -> buy_item}}</td>
              <td>{{$kakeiboInfo -> buy_price}}</td>
              <td>{{$kakeiboInfo -> buy_shop}}</td>
              <td>{{$kakeiboInfo -> buy_remarks}}</td>
            </tr>
            @endforeach
          </table>
          <div style="margin-top:5px;">
            <button class="uk-button uk-button-default uk-button-small" onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
          </div>
        </div>
    </div>
            <script>
              var categoryList = [];
              var priceList = [];
              for(i=0; i<{{sizeof($kakeiboInfoGroupByCategoryList)}}; i++){
                categoryList.push(document.getElementById("cateboryAggregate_" + i).innerText);
                priceList.push(document.getElementById("priceAggregate_" + i).innerText);
              }
              var ctx = document.getElementById("kakeiboChart");
              var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                  labels: categoryList,
                  datasets: [{
                      label: '家計簿',
                      data: priceList,
                      borderWidth: 1
                  }]
              },
              options: {
                  responsive: false,
              	  
                  colorschemes: {
                    scheme: 'brewer.Paired12'
                  },
                  legend: {
              		position: 'right'
                  }
              }
           });
           </script>

    </body>
</html>
