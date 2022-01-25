@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Thống kê</title>
<style type="text/css">
  .thongke{
    padding: 20px;
  }
  .solieu{
    margin: 0px auto;
    text-align: center;
  }
  @media only screen and (min-width: 992px) {
    .noidung{
      height: 228px;
    }
    .title{
      height: 39px;
    }
  }
}
</style>
<script src="source/js/print.js"></script>
<!-- Bắt đầu Body-->
<div class="container">
  <div class="row" style="background: white">
    <div class="col-xs-6 col-md-6 col-md-6 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center><h4>Thống Kê Theo Năm</h4></center>
        </div>
        <div class="panel-body">
          <form action="{{route('thong-ke-theo-nam')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-lg-6" style="padding: 0px 0px;">
              <div class="form-group" >
                <label class="col-lg-12 control-label">
                  Năm
                </label>
                <div class="col-lg-12">
                  <select class="form-control" name="nam">
                    @foreach ($ListYear as $value)
                    <option value="{{$value}}"@if($Nam == $value)
                    selected
                    @endif>{{$value}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6" style="padding: 0px 0px;">
              <div class="form-group">
                <label class="col-lg-12 control-label">
                  Lọc theo
                </label>
                <div class="col-lg-12">
                  <label class="radio-inline">
                    <input type="radio" name="radio" value="0" checked>Theo Tháng
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="radio" value="1">Theo Quý
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-default">Lọc</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-6 col-md-6 col-lg-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <center><h4>Thống Kê Theo Khóa</h4></center>
        </div>
        <div class="panel-body">
          <form>
            <div class="col-lg-6" style="padding: 0px 0px;">
              <div class="form-group">
                <label class="col-lg-12 control-label">
                  Khóa
                </label>
                <div class="col-lg-12" >
                  <select class="form-control" style="width: 100%">
                    <option></option>
                    <option value="">Lớp Chứng Chỉ Tiếng Anh Tháng 9</option>
                    <option value="">Lớp Chứng Chỉ</option>
                    <option value="">Lớp Chứng Chỉ</option>
                    <option value="">Lớp Chứng Chỉ</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6" style="padding: 0px 0px;">
              <div class="form-group">
                <label class="col-lg-12 control-label">
                  Lớp
                </label>
                <div class="col-lg-12">
                  <select class="form-control">
                    <option></option>
                    <option value="">Lớp Chứng Chỉ Tiếng Anh tháng 9-1</option>
                    <option value="">Lớp Chứng Chỉ</option>
                    <option value="">Lớp Chứng Chỉ</option>
                    <option value="">Lớp Chứng Chỉ</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="button" class="btn btn-default">Lọc</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<p>
  <a type="button" class=" btn btn-default pull-right" href="javascript:void(0)" id="btnPrint" style="margin-right: 30px;">
    <i class="glyphicon glyphicon-print"></i>
  </a>
</p>
<div id="content" style="margin-bottom: 90px;">
  <center><h2><b>Thống Kê Học Viên Theo Tháng Năm {{$Nam}}</b></h2></center>
  <div class="container" style="background: white;">
    <div class="col-lg-12">
      <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
        <div class="panel panel-default"style="background: rgb(124, 181, 236); min-height: 150px">
          <div class="panel-body noidung">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <center><h1><i class="glyphicon glyphicon-th-large"></i></h1></center>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
              <div class="title"><h4><b>Khóa</b></h4></div>
              <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$Khoa[0]->Tong}}</b></h3></center></marquee>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
        <div class="panel panel-default"style="background:rgb(255, 188, 117); min-height: 150px">
          <div class="panel-body noidung">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <center><h1><i class="fas fa-users"></i></h1></center>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
              <div class="title"><h4><b>Lớp</b></h4></div>
              <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$Lop[0]->Tong}}</b></h3></center></marquee>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
        <div class="panel panel-default"style="background:rgb(128, 133, 233); min-height: 150px">
          <div class="panel-body noidung">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <center><h1><i class="fas fa-user-graduate"></i></h1></center>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
              <div class="title"><h4><b>Học Viên</b></h4></div>
              <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$HocVien}}</b></h3></center></marquee>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
        <div class="panel panel-default"style="background:rgb(169, 255, 150); min-height: 150px">
          <div class="panel-body noidung">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <center><h1><i class="fas fa-check"></i></i></h1></center>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
              <div class="title"><h4><b>Đạt</b></h4></div>
              <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$TongDat}}</b></h3></center></marquee>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
        <div class="panel panel-default"style="background: rgb(237, 95, 95); min-height: 150px">
          <div class="panel-body noidung">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <center><h1><i class="fas fa-times"></i></i></h1></center>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
              <div class="title"><h4><b>Không Đạt</b></h4></div>
              <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$TongKhongDat}}</b></h3></center></marquee>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bieudo_tt">
    <div class="container" style="padding-top: 20px">
      <div class=" panel panel-default">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" id="bieudocot">
            <div id="bieudocot_tt" style=" margin-bottom: 20px;"></div>
            <center><p>Biều đồ cột</p></center>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" id="bieudotron">
            <div id="bieudotron_tt" style=" margin-bottom: 20px"></div>
            <center><p>Biều đồ tròn</p></center>
          </div>
          <div class="col-lg-12" style="margin-top: 30px;" id="bieudoduong">
            <div id="bieudoduong_tt" style=" margin-bottom: 20px "></div>
            <center><p>Biều đồ đường</p></center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Kết Thúc Body-->
<script type="text/javascript">
    $(function () {


        Highcharts.chart('bieudocot_tt', {
      chart: {
        backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgb(169, 255, 150)'],
                 [1, 'rgba(20, 230, 245, 0.82)']
               ]
             },
        polar: true,
        type: 'column'

      },
      title: {
        text: 'Biểu Đồ Cột Thành Tích Học Viên '+ <?php echo $Nam ?>
      },
      xAxis: {
        categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        crosshair: true,
        labels:{
                style:{
                  color: "black"
                }
              }
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Học Viên'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.f} Học viên</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Đạt',
        data: <?php echo json_encode($Dat); ?>

      }, {
        name: 'KhongDat',
        data: <?php echo json_encode($KhongDat); ?>

      }]
    });


        Highcharts.chart('bieudotron_tt', {
          chart: {
            backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgb(169, 255, 150'],
                 [1, 'rgb(124, 181, 236)']
               ]
             },
            polar: true,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: 'Biểu Đồ Tròn Thành Tích Học Viên '+ <?php echo $Nam ?>
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
          },
          accessibility: {
            point: {
              valueSuffix: '%'
            }
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.2f} %'
              }
            }
          },
          series: [{
            name: 'Phần Trăm',
            colorByPoint: true,
            data: [{
              name: 'Đạt',
              y: <?php echo json_encode($pt_D); ?>
            }, {
              name: 'Không Đạt',
              y: <?php echo json_encode($pt_KD); ?>
            }]
          }]
        });
          Highcharts.chart('bieudoduong_tt', {
            chart: {
              backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(230, 235, 86, 0.88)'],
                 [1, 'rgba(88, 218, 170, 0.88)']
               ]
             },
              polar: true,
              type: 'spline'
            },
            title: {
              text: 'Biểu Đồ Đường Thành Tích Học Viên '+ <?php echo $Nam ?>
            },
            xAxis: {
              categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
              crosshair: true,
              labels:{
                style:{
                  color: "black"
                }
              }

            },

            yAxis: {
              title: {
                text: 'Học Viên'
              },
              labels: {
                formatter: function () {
                  return this.value;
                }
              },
              crosshair: true
            },
            tooltip: {
              crosshairs: true,
              shared: true
            },
            plotOptions: {
              spline: {
                marker: {
                  radius: 4,
                  lineColor: '#666666',
                  lineWidth: 1
                }
              }
            },
            series: [{
              name: 'Đạt',
              marker: {
                symbol: 'square'
              },
              data: <?php echo json_encode($Dat); ?>

            }, {
              name: 'Không Đạt',
              marker: {
                symbol: 'diamond'
              },
              data: <?php echo json_encode($KhongDat); ?>
            }]
          });

});
</script>     
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnPrint').click(function(){
      var bieudocot_tt = document.getElementById("bieudocot_tt");
      var bieudotron_tt = document.getElementById("bieudotron_tt");
      var bieudoduong_tt = document.getElementById("bieudoduong_tt");
      var WinPrint = window.open('','','left=0,top=0,width=800,height=800');
      var print = "<style type='text/css'>";
      print+="div#bieudocot_tt {width:540px;float:left}";
      print+="div#bieudocot_tt .highcharts-root{width:500px;}";
      print+="div#bieudotron_tt .highcharts-root{width:340px;}";
      print+="div#bieudoduong_tt .highcharts-root{width:880px;}";
      print+="</style>";
      print+= "<h1><center><b>Thống Kê Học Viên 2021</b> </center></h1>";
      print+="<table  align='center' width='900px' style='font-size: 20px; line-height: 30px'>";
      print+="<thead align='center'>";
      print+="<tr>";
      print+="<th style='width:150px'>Khóa</th>";
      print+="<th style='width:150px'>Lớp</th>";
      print+="<th style='width:150px'>Học Viên</th>";
      print+="<th style='width:150px'>Đạt</th>";
      print+="<th style='width:150px'>Không Đạt</th>";
      print+="</tr>";
      print+="</thead>";
      print+="<tbody align='center'>";
      print+="<tr>";
      print+="<td>"+{{$Khoa[0]->Tong}}+"</td>";
      print+="<td>"+{{$Lop[0]->Tong}}+"</td>";
      print+="<td>"+{{$HocVien}}+"</td>";
      print+="<td>"+{{$TongDat}}+"</td>";
      print+="<td>"+{{$TongKhongDat}}+"</td>";
      print+="</tr>";
      print+="</tbody>";
      print+="</table>";
      print+= bieudocot_tt.outerHTML;
      print+= bieudotron_tt.outerHTML;
      print+= bieudoduong_tt.outerHTML;
      console.log(print);
      WinPrint.document.write(print);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
    });
  });
</script>       
@endsection
@endif