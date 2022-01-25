@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Giảng Viên</title>
<link rel="stylesheet" type="text/css" href="source/css/sttTable.css">
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">{{Session::get('themthanhcong')}}
</div>
@endif
@if(Session::has('capnhatthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
  {{Session::get('capnhatthanhcong')}}
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background: white">
  <div class="pannel panel-default">
    <div class="panel-heading">
      <center><h3>Giảng Viên</h3></center>
    </div>
  </div>
  <button type="button" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;" data-toggle="modal" data-target="#themgiangvien">
  <i class="glyphicon glyphicon-plus-sign"></i> Thêm
  </button>
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-striped table-responsive" id="table_giangvien">
        <thead >
          <tr style="background-color:#337ab7;color: white; font-size: 12px">
            <th hidden="true"></th>
            <th>STT</th>
            <th>Tên Giảng Viên</th>
            <th>Học Vị</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($giangvien as $gv)
          <tr class="onRow">
            <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true" class="id">{{$gv->ID}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)"></td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="hoten">{{$gv->HoTenGV}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="hocvi">{{$gv->HocVi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="gioitinh">{{$gv->GioiTinh}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="ngaysinh">{{date('d/m/Y', strtotime($gv->NgaySinh))}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="diachi">{{$gv->DiaChi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="sdt">{{$gv->SDT}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="email">{{$gv->Email}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">
              <center>
                <a data-toggle="modal" href="#editgiangvien" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="{{route('xoa-giang-vien',$gv->ID)}}" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
                </center>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Bắt đầu modal-->
<div class="modal fade" id="themgiangvien">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Thêm Giảng Viên</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('post-giang-vien')}}" method="post" role="form" id='form-giang-vien'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Giảng Viên</label>
              <div class="col-lg-8 ">
                <input type="text" name="tengiangvien" class="form-control"  required="required"   placeholder='Tên Giảng Viên'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Học Vị</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="hocvi">
                  <option value="Thực Tập Sinh">Thực Tập Sinh</option>
                  <option value="Thạc Sỹ">Thạc Sỹ</option>
                  <option value="Tiến Sỹ">Tiến Sỹ</option>
                  <option value="Giáo Sư">Giáo Sư</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giới Tính</label>
              <div class="col-lg-8 ">
                <select name="gioitinh" class="form-control" >
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày Sinh</label>
              <div class="col-lg-8 ">
                <input type="date" name="ngaysinh" class="form-control"  required="required"   placeholder='Ngày sinh'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Địa Chỉ</label>
              <div class="col-lg-8 ">
                <input type="text" name="diachi" class="form-control"  required="required"   placeholder='Địa chỉ'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">SĐT</label>
              <div class="col-lg-8 ">
                <input type="number" name="sdt" class="form-control"  required="required"   placeholder='Số điện thoại'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Email</label>
              <div class="col-lg-8 ">
                <input type="email" name="email" class="form-control"  required="required"   placeholder='Email'>
              </div>
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </form>
          <br/>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Kết Thúc Modal-->
<!-- Bắt đầu modal-->
<div class="modal fade" id="editgiangvien">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Cập Nhật Giảng Viên</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('edit-giang-vien')}}" method="post" role="form" id='form-edit-giang-vien'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group" hidden>
              <label class="col-lg-4"></label>
              <div class="col-lg-8">
                <input type="text" name="e_id" class="e-id" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Giảng Viên</label>
              <div class="col-lg-8 ">
                <input type="text" name="e_tengiangvien" class="e-tengiangvien form-control"  required="required"   placeholder='Tên Giảng Viên'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Học Vị</label>
              <div class="col-lg-8 ">
                <select class="e-hocvi form-control" name="e_hocvi">
                  <option value="Thực Tập Sinh">Thực Tập Sinh</option>
                  <option value="Thạc Sỹ">Thạc Sỹ</option>
                  <option value="Tiến Sỹ">Tiến Sỹ</option>
                  <option value="Giáo Sư">Giáo Sư</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giới Tính</label>
              <div class="col-lg-8 ">
                <select name="e_gioitinh" class="e-gioitinh form-control" >
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày Sinh</label>
              <div class="col-lg-8 ">
                <input type="text" name="e_ngaysinh" class="e-ngaysinh form-control"  required="required"   placeholder='Ngày sinh'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Địa Chỉ</label>
              <div class="col-lg-8 ">
                <input type="text" name="e_diachi" class="e-diachi form-control"  required="required"   placeholder='Địa chỉ'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">SĐT</label>
              <div class="col-lg-8 ">
                <input type="number" name="e_sdt" class="e-sdt form-control"  required="required"   placeholder='Số điện thoại'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Email</label>
              <div class="col-lg-8 ">
                <input type="email" name="e_email" class="e-email form-control"  required="required"   placeholder='Email'>
              </div>
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
          </form>
          <br/>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Kết Thúc Modal-->
<script type="text/javascript">
  $("#thongbao").fadeOut(10000);
    $("#thongbaoloi").fadeOut(10000);
     $("#table_giangvien").DataTable({
              "language": {
                 "lengthMenu": "Xem _MENU_ mục",
                "zeroRecords": "Không tìm thấy dòng nào phù hợp",
                "info": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sSearch":       "Tìm kiếm :",
                "infoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "infoFiltered": "(được lọc từ _MAX_ mục)",
                "oPaginate":{
                      "sFirst":    "Đầu",
                      "sPrevious": "Trước",
                      "sNext":     "Tiếp",
                      "sLast":     "Cuối",
                }
                          },
                "pagingType": "full_numbers",
                 "displayLength": 10,
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
            });
</script>
<script type="text/javascript">
    
    $(document).ready(function(){

      $('.btnEdit').click(function(){
          $('.e-id').val($(this).parents("tr").find(".id").text()); 
          $('.e-tengiangvien').val($(this).parents("tr").find(".hoten").text());
          $('.e-hocvi').val($(this).parents("tr").find(".hocvi").text()); 
          $('.e-gioitinh').val($(this).parents("tr").find(".gioitinh").text());
          $('.e-ngaysinh').val($(this).parents("tr").find(".ngaysinh").text()); 
          $('.e-noisinh').val($(this).parents("tr").find(".noisinh").text()); 
          $('.e-diachi').val($(this).parents("tr").find(".diachi").text()); 
          $('.e-sdt').val($(this).parents("tr").find(".sdt").text()); 
          $('.e-email').val($(this).parents("tr").find(".email").text()); 
          // $('#modalEdit').modal();

      });

    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#thongbao').fadeOut(10000);
  });
  
</script>
@endsection
@endif