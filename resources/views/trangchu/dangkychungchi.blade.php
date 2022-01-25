@extends('master')
@section('content')
<title>Đăng ký lớp học</title>
@if(Session::has('dangkythanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">  {{Session::get('dangkythanhcong')}}
</div>
@endif
@if(Session::has('dangkythatbai'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">  {{Session::get('dangkythatbai')}}
</div>
@endif
<style type="text/css">
  @-webkit-keyframes my {
   0% { color: #F8CD0A; } 
   50% { color: #fff;  } 
   100% { color: #F8CD0A;  } 
 }
 @-moz-keyframes my { 
   0% { color: #F8CD0A;  } 
   50% { color: #fff;  }
   100% { color: #F8CD0A;  } 
 }
 @-o-keyframes my { 
   0% { color: #F8CD0A; } 
   50% { color: #fff; } 
   100% { color: #F8CD0A;  } 
 }
 @keyframes my { 
   0% { color: #F8CD0A;  } 
   50% { color: #fff;  }
   100% { color: #F8CD0A;  } 
 } 
 .text {
         background:#3d3d3d;
         font-size:24px;
         font-weight:bold;
   -webkit-animation: my 700ms infinite;
   -moz-animation: my 700ms infinite; 
   -o-animation: my 700ms infinite; 
   animation: my 700ms infinite;
}
</style>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3>THÔNG BÁO MỞ CÁC LỚP LUYỆN THI</h3></center>
    </div>
    <div class="panel-body" style="font-size: 12px">
      <marquee class ="text" ><h4><b>Trung tâm xin thông báo mở các lớp luyện thi dành cho mọi lứa tuổi.</b></h4></marquee>
      <form action="" method="post" role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="table-responsive">
          <table class="table table-striped" style="font-size: 18px;">
            <thead >
              <tr style="background-color:gray;color: white; font-size: 14px">
                <th hidden="true">ID</th>
                <th>Khóa</th>
                <th>Tên Khóa</th>
                <th>Khai Giảng</th>
                <th>Thời Gian Thi</th>
                <th>Học Phí</th>
                <th><center>Thao Tác</center></th>
              </tr>
            </thead>
            <tbody id="myTable">
              @foreach ($khoahoc as $khoahoc)
              <tr for="{{$khoahoc->IDKhoa}}" style="font-size: 12px">
                <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true">{{$khoahoc->IDKhoa}}</td>
                <td style="border: 2px solid rgba(192,192,192,0.8)">{{$khoahoc->Ten}}</td>
                <td style="border: 2px solid rgba(192,192,192,0.8)">{{$khoahoc->TenKhoa}}</td>
                <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($khoahoc->NgayKhaiGiang))}}</td>
                <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($khoahoc->ThoiGianThi))}}</td>
                <td style="border: 2px solid rgba(192,192,192,0.8);font-weight: bold; color: red">{{number_format($khoahoc->HocPhi)}} VND</td>
                <td style="border: 2px solid rgba(192,192,192,0.8)">
                  <center>
                  <button style="font-size: 12px" type="button" class="btn btn-info" data-toggle="collapse" data-target=".{{$khoahoc->IDKhoa}}" id="{{$khoahoc->IDKhoa}}">Xem Lớp</button>
                  </center>
                </td>
              </tr>
              {{--  <tr class="collapse {{$khoahoc->IDKhoa}}">
                <th hidden="true">ID</th>
                <th colspan="3">Tên lớp</th>
                <th>Buổi</th>
                <th>Ngày học</th>
                <th>Thời gian học</th>
                <th></th>
              </tr> --}}
              <tr class="collapse alert alert-info {{$khoahoc->IDKhoa}}">
                <td colspan="7">
                  <table width="100%" class="table" style="font-size: 16px">
                     <thead>
                      <tr style="background-color:#5bc0de">
                        <th hidden="true">ID</th>
                        <th colspan="3">Tên lớp</th>
                        <th>Buổi</th>
                        <th>Ngày học</th>
                        <th>Thời gian học</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="tt{{$khoahoc->IDKhoa}}" style="color: black">
                      @foreach($lophoc as $lh)
                        @if($khoahoc->IDKhoa == $lh->ID_KhoaHoc)
                          <tr>
                            <td hidden="true">{{$lh->ID}}</td>
                            <td colspan=3>{{$lh->TenLop}}</td>
                            <td>{{$lh->BuoiHoc}}</td>
                            <td>Thứ {{$lh->NgayHoc}}</td>
                            <td>{{$lh->ThoiGianHoc}}</td>
                            <td> <a href="{{route('dang-ky-lop',$lh->ID)}}" class="dangkylop">Đăng ký</a></td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Bắt đầu Modal chi tiết học viên-->
<div class="modal " id="modallophoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <!-- Kết Thúc Modal Chi tiết học viên-->
</div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
     $('.dangkylop').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            $.ajax({
                url: URL

            }).done(function(results){
              console.log(results);
              $('#modallophoc').html(results.html);
              $('#modallophoc').modal({
                show: true
               });

            });

        });
  });
</script>
@endsection