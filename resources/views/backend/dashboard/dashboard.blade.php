@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Người dùng: {{$dataShow[0]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/users">Quản lý người dùng</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Sản phẩm: {{$dataShow[1]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/products">Quản lý sản phẩm</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Đơn hôm nay: {{$dataShow[2]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/orders">Quản lý đơn hàng</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Bài viết: {{$dataShow[3]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/posts">Quản lý bài viết</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <form>
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class='form-group'>
                <label for="">Từ ngày</label>
                <input type="date" name="day_from" placeholder="Từ ngày"  class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class='form-group'>
                <label for="">Đến ngày</label>
                <input type="date" name="day_to" placeholder="Đến ngày" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Chọn ngày lọc</label>
                <select name="day_filter" id="day_filter" class="form-control">
                  <option>---Chọn---</option>
                  <option value="7">7 ngày trước</option>
                  <option value="30">30 ngày trước</option>
                  <option value="60">60 ngày trước</option>
                  <option value="365">365 ngày trước</option>
                </select>
              </div>
            </div>
            <button class="btn btn-primary filter" type="button">Lọc</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div id="chart-line-left">

        </div>
      </div>
      <div class="col-md-6">
        <div id="chart-line-right">

        </div>
      </div>
    </div>
    <br><hr>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Top khách hàng</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr class="text-primary">
                    <th>Tên khách hàng</th>
                    <th>Đã Chi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataUserTop as $item)
                  <tr>
                    <td>{{$item->user->user_name ?? ''}}</td>
                    <td>{{number_format($item->total)}} VNĐ</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="city_buy">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <ul class="nav nav-tabs" style="background: #9c27b0;" id="myTab" role="tablist">
          <li class="nav-item text-center" style="width:33%;">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sản phẩm tồn kho</a>
          </li>
          <li class="nav-item text-center" style="width:33%;">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sản phẩm bán chạy</a>
          </li>
          <li class="nav-item text-center" style="width:33%;">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Sản phẩm yêu thích</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr class="text-primary">
                      
                      <th>Sản phẩm</th>
                      <th>Tồn kho</th>
                      <th>Hình ảnh</th>
                    </tr>
                  </thead>
                  @if ($dataTagNav[0] != null)
                  <tbody>
                    @foreach ($dataTagNav[0] as $product)
                    <tr>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->product_amount}}</td>
                      <td><img style="width: 50px" src="{{$product->product_image}}" alt=""></td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr class="text-primary">
                      <th>Sản phẩm</th>
                      <th>Số lượt mua</th>
                      <th>Giá mua</th>
                      <th>Giá bán</th>
                      <th>Hình ảnh</th>
                    </tr>
                  </thead>
                  @if ($dataTagNav[1] != null)
                  <tbody>
                    @foreach ($dataTagNav[1] as $product)
                    <tr>
                      <td>{{$product->product->product_name}}</td>
                      <td>{{$product->qty}}</td>
                      <td>{{number_format($product->product->product_price_buy)}}</td>
                      <td>{{number_format($product->product->product_price_sell)}}</td>
                      <td><img style="width: 50px" src="{{$product->product->product_image}}" alt=""></td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr class="text-primary">
                      <th>Sản phẩm</th>
                      <th>Số lượt yêu thích</th>
                      <th>Hình ảnh</th>
                    </tr>
                  </thead>
                  @if ($dataTagNav[2] != null)
                  <tbody>
                    @foreach ($dataTagNav[2] as $product)
                    <tr>
                      <td>{{$product->product->product_name}}</td>
                      <td>{{$product->qty}}</td>
                      <td><img style="width: 50px" src="{{$product->product->product_image}}" alt=""></td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $('#home-tab').click(function(){
      $('#home').addClass('show active');
      $('#profile').removeClass('show active');
      $('#contact').removeClass('show active');
    })
    $('#profile-tab').click(function(){
      $('#profile').addClass('show active');
      $('#home').removeClass('show active');
      $('#contact').removeClass('show active');
    })
    $('#contact-tab').click(function(){
      $('#contact').addClass('show active');
      $('#home').removeClass('show active');
      $('#profile').removeClass('show active');
    })
  </script>
    <script>
      showChart()
      showPieCity()
      function showChart() {
        var _token = $('input[name=_token]').val()
        $.ajax({
          url: 'admin/get-data-chart-line',
          method: 'POST',
          data: {
            _token: _token,
            day: 7,
          },
          success: function(data){
            $('#chart-line-left').html('<canvas id="myChart" style="max-width: 500px;"></canvas>')
            $('#chart-line-right').html('<canvas id="lineChart"></canvas>')
            chartLeft(data);
            chartRight(data);
          }
        })
      }

      function showPieCity() {
        $.ajax({
          url: 'admin/get-data-chart-pie-city',
          method: 'GET',
          success: function (data) {
            $('.city_buy').html('<canvas id="pieChart"></canvas>');
            chartCity(data)
          }
        })
      }

      $('.filter').click(function(){
        var _token = $('input[name=_token]').val()
        var dayTo = $('[name=day_to]').val()
        var dayFrom = $('[name=day_from]').val()
        $.ajax({
          url: 'admin/get-data-chart-line-date',
          method: 'POST',
          data: {
            _token: _token,
            day_to: dayTo,
            day_from: dayFrom,
          },
          success: function(data){
            $('#chart-line-left').html('<canvas id="myChart" style="max-width: 500px;"></canvas>')
            $('#chart-line-right').html('<canvas id="lineChart"></canvas>')
            chartLeft(data);
            chartRight(data);
          }
        })
      })

      $('#day_filter').change(function(){
        var _token = $('input[name=_token]').val()
        var dayFilter = $('select[name=day_filter]').val()

        $.ajax({
          url: 'admin/get-data-chart-line',
          method: 'POST',
          data: {
            _token: _token,
            day: dayFilter,
          },
          success: function(data){
            $('#chart-line-left').html('<canvas id="myChart" style="max-width: 500px;"></canvas>')
            $('#chart-line-right').html('<canvas id="lineChart"></canvas>')
            chartLeft(data);
            chartRight(data);
          }
        })
      })

      //line

      function chartCity(data) {
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
        labels: data[0],
        datasets: [{
        data: data[1],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
        },
        options: {
        responsive: true
        }
        });
      }

      function chartLeft(data) {
        
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
          labels: data[0],
          datasets: [{
          label: 'Đơn hàng',
          data: data[1],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
          }]
          },
          options: {
          scales: {
          yAxes: [{
          ticks: {
          beginAtZero: true
          }
          }]
          }
          }
        });
      }
      
      function chartRight(data) {
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
          type: 'line',
          data: {
          labels: data[0],
          datasets: [{
          label: "Lợi nhuận",
          data: data[2],
          backgroundColor: [
          'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
          'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
          },
          {
          label: "Tổng Tiền Hàng",
          data: data[3],
          backgroundColor: [
          'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
          'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
          }
          ]
          },
          options: {
          responsive: true
          }
        });
      }
    </script>
@endsection