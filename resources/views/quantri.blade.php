<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <link rel="icon" type="image/png" href="source/img/Logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> <!-- CSS Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- CDn Jquery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <!-- CDN Boostrap -->
    <script src="source/jquery-editable-select-master/src/jquery-editable-select.js"></script> <!-- EditTable Select -->
    <link rel="stylesheet" type="text/css" href="source/jquery-editable-select-master/dist/jquery-editable-select.css"> <!-- Css EditTable Select-->
    <link rel="stylesheet" type="text/css" href="source/jquery-editable-select-master/dist/jquery-editable-select.min.css"> <!-- Css EditTable Select-->
    <script src="source/jquery-editable-select-master/dist/jquery-editable-select.min.js"></script> <!-- EditTable Select -->
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script> <!-- DataTable-->
    <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!--CDN dataTable-->
    
    <!-- buttons -->
    <!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> -->
    
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"> <!--CDN css dataTable-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> <!-- CDN font awesome-->
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script> <!-- CDN table2exxel Export file excel-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> <!-- Datepicker JS-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script> <!--Validate Jquery-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> <!-- Datepicker Css-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    
    <link rel="stylesheet" type="text/css" href="source\css\style.css">
    
  </head>
  
  <body>
    <div class="container-fluid" >
      <div class="row">
        <!--Bắt đầu Header-->
        <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="background: #e8e8e8;">
          <div class="col-lg-12" style="background: #ffffff" >
          <div class="pannel panel-default" style="padding-top: 20px; height:130px ; background: #104c96">
            <div class="col-xs-3 col-sm-3 col-md-1 col-lg-1">
              <img src="source/img/Logo.png" style="width: 80px;height: 80px">
            </div>
            <div class="col-xs-9 col-sm-9 col-md-11 col-lg-11" style="color: white">
              <h4>TRƯỜNG ĐẠI HỌC KỸ THUẬT CÔNG NGHỆ CẦN THƠ</h4>
              <h5>Quản Trị Hệ Thống Trung Tâm</h5>
            </div>
          </div>
        </div>
        <!--Kết Thúc Header-->
        <!--Bắt Đầu Navbar-->
        <div class="col-lg-12" style="background: #ffffff; z-index: 1;">
          <div class="panel panel-default ">
            <div class="panel-body" style="padding: 0px !important;font-size: 16px; height: 56px;">
              <div class="navbar navbar-inverse ">
                <div class="navbar-header">
                  <button type="button" class="btn-resize navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{route('trang-chu')}}" style="font-size: 16px;color: white" title="Trang Chủ">Trang chủ</a>
                </div>
                <div class="navbar-collapse navbar-inverse-collapse collapse" style="font-size: 16px; background-color: #337ab7;">
                  @if(session()->has('canbo'))
                  @if(session('canbo')->PhanQuyen == 1)
                  <ul class="nav navbar-nav" id="navTuyChon">
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Văn Bằng">Văn bằng <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          {{-- <li>
                            <a href="{{route('tra-cuu-van-bang')}}" title="Tra cứu văn bằng">Tra cứu văn bằng</a>
                          </li> --}}
                          @if(session()->has('canbo'))

                          <li>
                            <a href="{{route('them-van-bang')}}" title="Nhập văn bằng">Nhập văn bằng</a>
                          </li>
                          <li>
                            <a href="{{route('duyet-van-bang')}}" title="Duyệt văn bằng">Duyệt văn bằng</a>
                          </li>
                          <li>
                            <a href="{{route('cap-phat-van-bang')}}" title="Cấp phát văn bằng">Cấp phát văn bằng</a>
                          </li>
                          @endif
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Thông Báo">Thông báo <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('dang-thong-bao')}}" title="Đăng Thông Báo">Đăng thông báo</a>
                          </li>
                          <li>
                            <a href="{{route('danh-sach-thong-bao')}}" title="Danh Sách Thông Báo">Danh sách thông báo</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Tuyển sinh">Tuyển sinh <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('khoa-hoc')}}" title="Khóa học">Khóa học</a>
                          </li>
                          <li>
                            <a href="{{route('lop-hoc')}}" title="Lớp học">Lớp học</a>
                          </li>
                          <li>
                            <a href="{{route('lop-hoc-phan')}}" title="Lớp học phần">Lớp học phần</a>
                          </li>
                          <li>
                            <a href="{{route('lopthi')}}" title="Lớp thi">Lớp thi</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Học Viên">Học viên <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li>
                            <a href="{{route('nhap-bien-lai')}}" title="Nhập biên lai học phí">Nhập biên lai học phí</a>
                          </li>
                          <li>
                            <a href="{{route('sap-xep-lop-thi')}}" title="Sắp xếp lớp thi">Sắp xếp lớp thi</a>
                          </li>
                          <li>
                             <a href="{{route('danh-sach-thi')}}" title="Danh sách thi">Danh sách thi</a>
                          </li>
                          <li>
                            <a href="{{route('lophoc')}}" title="Lớp học">Lớp học</a>
                          </li>
                          <li>
                            <a href="{{route('nhap-diem')}}" title="Nhập điểm">Nhập điểm</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a href="{{route('thong-ke')}}" title="Thông kê">Thống kê</a>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Quản trị">Quản trị <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('danh-muc')}}" title="Danh nục">Danh mục</a>
                          </li>
                          <li>
                            <a href="{{route('chung-chi')}}" title="Chứng chỉ">Chứng chỉ</a>
                          </li>
                          <li>
                            <a href="{{route('phong')}}" title="Phòng học">Phòng Học</a>
                          </li>
                          <li>
                            <a href="{{route('giang-vien')}}" title="Giảng viên">Giảng viên</a>
                          </li>
                          <li>
                            <a href="{{route('nguoi-dung')}}" title="Quản lý người dùng">Quản lý người dùng</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                  @elseif(session('canbo')->PhanQuyen == 2)
                    <ul class="nav navbar-nav" id="navTuyChon">
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Văn Bằng">Văn bằng <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          {{-- <li>
                            <a href="{{route('tra-cuu-van-bang')}}" title="Tra cứu văn bằng">Tra cứu văn bằng</a>
                          </li> --}}
                          @if(session()->has('canbo'))

                          <li>
                            <a href="{{route('them-van-bang')}}" title="Nhập văn bằng">Nhập văn bằng</a>
                          </li>
                          <li>
                            <a href="{{route('duyet-van-bang')}}" title="Duyệt văn bằng">Duyệt văn bằng</a>
                          </li>
                          <li>
                            <a href="{{route('cap-phat-van-bang')}}" title="Cấp phát văn bằng">Cấp phát văn bằng</a>
                          </li>
                          @endif
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Thông Báo">Thông báo <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('dang-thong-bao')}}" title="Đăng Thông Báo">Đăng thông báo</a>
                          </li>
                          <li>
                            <a href="{{route('danh-sach-thong-bao')}}" title="Danh Sách Thông Báo">Danh sách thông báo</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Tuyển sinh">Tuyển sinh <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('khoa-hoc')}}" title="Khóa học">Khóa học</a>
                          </li>
                          <li>
                            <a href="{{route('lop-hoc')}}" title="Lớp học">Lớp học</a>
                          </li>
                          <li>
                            <a href="{{route('lop-hoc-phan')}}" title="Lớp học phần">Lớp học phần</a>
                          </li>
                          <li>
                            <a href="{{route('lopthi')}}" title="Lớp thi">Lớp thi</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Học Viên">Học viên <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li>
                            <a href="{{route('nhap-bien-lai')}}" title="Nhập biên lai học phí">Nhập biên lai học phí</a>
                          </li>
                          <li>
                             <a href="{{route('sap-xep-lop-thi')}}" title="Sắp xếp lớp thi">Sắp xếp lớp thi</a>
                          </li>
                           <li>
                             <a href="{{route('danh-sach-thi')}}" title="Danh sách thi">Danh sách thi</a>
                          </li>
                          <li>
                            <a href="{{route('lophoc')}}" title="Lớp học">Lớp học</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <a href="{{route('thong-ke')}}" title="Thông kê">Thống kê</a>
                      </div>
                    </li>
                  </ul>
                  @elseif(session('canbo')->PhanQuyen == 3)
                  <ul class="nav navbar-nav" id="navTuyChon">
                    <li>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="" title="Học Viên">Học viên <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('nhap-diem')}}" title="Nhập điểm">Nhập điểm</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                  @endif
                  @endif
                  <ul class="nav navbar-nav navbar-right" id="navDangNhap">
                    @if(Session::has('canbo'))
                    <li>
                      <div class="dropdown">
                        <a style="text-transform: capitalize" data-toggle="dropdown" href="" title="{{Session('canbo')->TaiKhoan}}"><span class="glyphicon glyphicon-user"></span> &nbsp {{Session('canbo')->TaiKhoan}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a  data-toggle='modal' href="#doimatkhau"title="Đổi mật khẩu"><span class="glyphicon glyphicon-refresh"></span> Đổi mật khẩu</a>
                          </li>
                          <li>
                            <a href="{{route('dang-xuat-can-bo')}}"title="Đăng Xuất"><span class="glyphicon glyphicon-log-in"></span> Đăng Xuất</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    @else
                    <li><a href="{{route('dang-nhap-can-bo')}}" data-toggle="modal" title="Đăng Nhập"><span class="glyphicon glyphicon-user"></span> Đăng Nhập</a></li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Kết thúc Navbar-->
        <!-- Bắt đầu Body-->
        @yield('content')
        
        @if(Session::has('dangnhapthanhcong'))
        <div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
          <i class="glyphicon glyphicon-ok"></i>&nbsp
          {{Session::get('dangnhapthanhcong')}}
        </div>
        @endif
        @if(Session::has('themthanhcong'))
        <div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
          <i class="glyphicon glyphicon-ok"></i>{{Session::get('themthanhcong')}}
        </div>
        @endif
         @if(Session::has('capnhatthanhcong'))
        <div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
          <i class="glyphicon glyphicon-ok"></i>{{Session::get('capnhatthanhcong')}}
        </div>
        @endif
        @if(count($errors)>0)
        <div class="alert" style="font-size: 20px;right: 0px;top:0px;display: block;position: fixed; background: white; color: red;z-index: 2" id="thongbaoloi">
          
          {{$errors->first()}}
          
        </div>
        @endif
        <!-- Kết Thúc Body-->
        
      </div>
      <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1">
        </div>
    </div>
<!-- Bắt đầu modal đổi mật khẩu -->
@if(session()->has('canbo'))
<div class="modal fade" id="doimatkhau" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 16px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3><b>Đổi Mật Khẩu</b></h3></center>
      </div>
      <div class="modal-body" id="">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" action="{{route('doi-mat-khau')}}" method="POST" role="form" id="form_doimatkhau">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class=" col-lg-4 control-label">Tên đơn vị quản lý</label>
                <label class="col-lg-8 "> Trung Tâm Ngoại Ngữ - Tin Học CTUT</label>
              </div>
              <div class="form-group">
                  <label class="col-lg-4 control-label">
                    Tài Khoản:
                  </label>
                <div class="col-lg-8">
                  <input type="text" name="taikhoan"  id="taikhoan" class="form-control" value="{{session('canbo')->TaiKhoan}}" readonly>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-4 control-label">
                    Mật Khẩu Cũ:
                  </label>
                <div class="col-lg-8">
                  <input type="password" name="matkhau"  id="matkhau" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-4 control-label">
                    Mật Khẩu Mới:
                  </label>
                <div class="col-lg-8">
                  <input type="password" name="matkhaumoi"  id="matkhaumoi" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-4 control-label">
                    Nhập Lại Mật Khẩu Mới:
                  </label>
                <div class="col-lg-8">
                  <input type="password" name="nhaplaimatkhaumoi"  id="nhaplaimatkhaumoi" class="form-control" required>
                </div>
              </div>
              <button type="submit" class="btn btn-success pull-right" style="width: 120px;" id="btn_XacNhan">Xác Nhận
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
<!-- Kết thút modal dổi mật khẩu-->
</div>
        
    <!--Bắt đầu Footer-->
    <div class="container-fluid " style="height:100%">
      <div class="row">
        <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 footer">
          <p>Trung Tâm Ngoại Ngữ - Tin Học Đại Học Kỹ Thuật Công Nghệ Cần Thơ</p>
          <p>Địa Chỉ: Số 256, Nguyễn Văn Cừ, phường An Hòa, quận Ninh Kiều, TP.Cần Thơ</p>
          <p>Email:  ttnnth@ctuet.edu.vn</p>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
      </div>
    </div>
    <!--Kết thúc Footer-->
    <script type="text/javascript">
    $("#thongbaoloi").fadeOut(10000);
    $("#thongbao").fadeOut(10000);
    </script>
     <script type="text/javascript">
    let msg = '{{Session::get('doimatkhau')}}';
    let exist = '{{Session::has('doimatkhau')}}';
    if(exist){
    alert(msg);
    }
  </script>
  {{-- <script type="text/javascript">
    
    let check = '{{Session::has('canbo')}}';
    if(check){
      let quyen = '{{session('canbo')->PhanQuyen == 0}}';
      if(quyen){
        window.location= '{{route('dang-nhap-can-bo')}}';
        alert('Bạn đang làm gì đó !!!');
      }
    }
  </script> --}}
  </body>
</html>