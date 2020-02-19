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
          <p>家計簿</p>
        </div>
        <div>
          <canvas id="kakeiboChart" width="600" height="300"></canvas>
          <p>集計一覧</p>
          <table>
            <tr>
              <th>カテゴリ</th>
              <th>金額</th>
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
          <p>全データ</p>
          <table>
            <tr>
              <th>購入日</th>
              <th>カテゴリ</th>
              <th>商品</th>
              <th>金額</th>
              <th>店舗</th>
              <th>備考</th>
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
        </div>
        <button onclick="location.href='{{url('/kakeibo_top')}}'">Top</button>
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
                      label: '得票数',
                      data: priceList,
                      borderWidth: 1
                  }]
              },
              options: {
                  responsive: false,
                  colorschemes: {
                    scheme: 'brewer.Paired12'
                  }
              }
           });
           </script>

    </body>
</html>
