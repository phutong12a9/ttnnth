@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Lớp Học</title>
<style type="text/css">
  table {
    counter-reset: row-num;
  }

  table tbody tr {
    counter-increment: row-num;
  }

  table tr td:nth-child(1)::before {
    content: counter(row-num);
  }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Quản Lý Lớp Học</h3></center>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="form-group">
          <select id="khoahoc" class="form-control" style="width: 90%">
            <option value="all">Tất Cả</option>
            @foreach($khoa as $kh)
            <option value="{{$kh->ID}}">{{$kh->Ten}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div class="form-group">
          <select class="form-control" id="tenkhoa" style="width: 90%">

          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <form class="form-horizontal" action="" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="panel-body">
      <div id="body_banglophoc">
        <div class="btnChucNang" style="padding-bottom: 20px;">
          <button type="button"class="btn btn-primary" id="btn_MoLop" data-toggle="modal" data-target="#Modal_Lop">Mở Lớp Học</button>
        </div>
        <table class="table table-striped table-responsive" id="bang_lophoc">  
          <thead >
            <tr>
              <th></th>
              <th hidden="true"></th>
              <th>Tên Lớp</th>
              <th>Ngày Học</th>
              <th>Buổi Học</th>
              <th>Thời Gian Học</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach($lophoc as $lh)
            <tr>
              <td></td>
              <td hidden="true" class="id">{{$lh->ID}}</td>
              <td class="tenlop">{{$lh->TenLop}}</td>
              <td class="ngayhoc">Thứ {{$lh->NgayHoc}}</td>
              <td class="buoi">{{$lh->BuoiHoc}}</td>
              <td class="thoigian">{{$lh->ThoiGianHoc}}</td>
              <td>
                <center>
                <a data-toggle="modal" href="#modalEdit" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
                </center>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </form>
</div>
<!--Kết thúc body-->
<!-- Modal -->
<div id="Modal_Lop" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3 class="modal-title">Lớp Học</h3><center>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('lop-hoc-post')}}" class="form-horizontal">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label class="col-lg-4 control-label">Khóa *</label>
            <div class="col-lg-2">
              <select class="form-control" name="khoa" id="khoa">
                <option value=""></option>
                @foreach($khoa as $k)
                <option value="{{$k->ID}}">{{$k->Ten}}</option>
                @endforeach
              </select>
            </div>
            <label class="col-lg-2 control-label">Khóa Học *</label>
            <div class="col-lg-2">
              <select class="form-control" name="tenkhoahoc" id="tenkhoahoc">
                
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Ngày Học *</label>
            <div class="col-lg-6">
              <select class="form-control" id="ngayhoc" name="ngayhoc">
                <option value=""></option>
                <option value="2,4,6">Thứ 2,4,6</option>
                <option value="3,5,7">Thứ 3,5,7</option>
                <option value="2,3,4">Thứ 2,3,4</option>
                <option value="3,4,5">Thứ 3,4,5</option>
                <option value="4,5,6">Thứ 4,5,6</option>
                <option value="5,6,7">Thứ 5,6,7</option>
                <option value="6,7,CN">Thứ 6,7,CN</option>
                <option value="2,3">Thứ 2,3</option>
                <option value="2,4">Thứ 2,4</option>
                <option value="2,5">Thứ 2,5</option>
                <option value="2,6">Thứ 2,6</option>
                <option value="2,7">Thứ 2,7</option>
                <option value="2,CN">Thứ 2,CN</option>
                <option value="3,4">Thứ 3,4</option>
                <option value="3,5">Thứ 3,5</option>
                <option value="3,6">Thứ 3,6</option>
                <option value="3,7">Thứ 3,7</option>
                <option value="3,CN">Thứ 3,CN</option>
                <option value="4,5">Thứ 4,5</option>
                <option value="4,6">Thứ 4,6</option>
                <option value="4,7">Thứ 4,7</option>
                <option value="4,CN">Thứ 4,CN</option>
                <option value="5,6">Thứ 5,6</option>
                <option value="5,7">Thứ 5,7</option>
                <option value="5,CN">Thứ 5,CN</option>
                <option value="6,7">Thứ 6,7</option>
                <option value="6,CN">Thứ 6,CN</option>
                <option value="7,CN">Thứ 7,CN</option>
              </select>
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-4 control-label">Buổi Học *</label>
            <div class="col-lg-6">
              <select class="form-control" id="buoihoc" name="buoihoc">
                <option value=""></option>
                <option value="Sáng">Sáng</option>
                <option value="Tối">Tối</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tên Lớp</label>
            <div class="col-lg-6">
              <input type="text" name="tenlop" class="form-control" id="tenlop" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Thời Gian Học *</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="thoigianhoc" class="form-control" placeholder="Thời gian học" id="thoigianhoc">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
              <input type="submit" name="btn_Them" class="btn btn-success pull-right" id="btn_ThemLop" value="Thêm">
            </div>
          </div>
          <p><b>* Các trường bắt buộc</b></p>
        </form>
      </div>     
    </div>
  </div>
</div>
<!-- Modal Cập nhật -->
<div id="modalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3 class="modal-title">Cập Nhật Lớp Học</h3><center>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('edit-lop-hoc')}}" class="form-horizontal">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group" hidden="true">
            <label class="col-lg-4 control-label"></label>
            <div class="col-lg-6">
              <input type="text" name="e_id" class="form-control e-id" id="e-id" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tên Lớp</label>
            <div class="col-lg-6">
              <input type="text" name="e_tenlop" class="form-control e-tenlop" id="e-tenlop" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Ngày Học *</label>
            <div class="col-lg-6">
              <input class="form-control e-ngayhoc" id="e-ngayhoc" name="e_ngayhoc" readonly>
                
              </input>
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-4 control-label">Buổi Học *</label>
            <div class="col-lg-6">
              <input class="form-control e-buoi" id="e-buoihoc" name="e_buoihoc" readonly>
              </input>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Thời Gian Học *</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="e_thoigianhoc" class="form-control e-thoigianhoc" placeholder="Thời gian học" id="e-thoigianhoc">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
              <input type="submit" name="btn_CapNhat" class="btn btn-success pull-right" id="btn_CapNhatLop" value="Lưu">
            </div>
          </div>
          <p><b>* Các trường bắt buộc</b></p>
        </form>
      </div>     
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#bang_lophoc").DataTable({
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
                "scrollX": true,
                "displayLength": 25,
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
            });
  });
</script>
<script type="text/javascript">
  $('#btn_ThemLop').click(function(){
    var khoa = $('#khoa').val();
    var tenkhoa = $('#tenkhoahoc').val();
    var ngayhoc = $('#ngayhoc').val();
    var buoihoc = $('#buoihoc').val();
    var thoigianhoc = $('#thoigianhoc').val();

    if (khoa == "") {
      $('#khoa').css("border","2px solid red");
      event.preventDefault()
    }
    else {
      $('#khoa').css("border","none");
    }

    if (tenkhoa == "") {
      $('#tenkhoahoc').css("border","2px solid red");
      event.preventDefault()
    }
    else {
      $('#tenkhoahoc').css("border","none");
    }

    if (ngayhoc == "") {
      $('#ngayhoc').css("border","2px solid red");
      event.preventDefault()
    }
    else {
       $('#ngayhoc').css("border","none");
    }

    if (buoihoc == "") {
      $('#buoihoc').css("border","2px solid red");
      event.preventDefault()
    }
    else {
       $('#buoihoc').css("border","none");
    }

    if (thoigianhoc == "") {
      $('#thoigianhoc').css("border","2px solid red");
      event.preventDefault()
    }
    else{
       $('#thoigianhoc').css("border","none");
    }
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

       $("#khoahoc").change(function(){
        let ID = $(this).val();
         if (ID == "all") {
          location.reload();
        }
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoa').html(data);
        });
        $('#tenlophoc').empty();
      });
      $("#khoa").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoahoc').html(data);

        });
      });

      $("#tenlophoc").change(function(){
        let ID = $("#tenlophoc").val();
        $.get("ajax/lophoc/"+ID,function(data){
            $("#bang_lophoc").html(data);
          });
         $.get("ajax/tenlophp/"+ID,function(data){
            $("#tenlophp").html(data);
          });
        $("#trangthai").show();
      });

      $("#tenkhoa").change(function(){
        let ID = $("#tenkhoa").val();
        // $.get("ajax/khoahoc/"+ID,function(data){
        //   $("#bang_lophoc").html(data);
        //   });

        $.get("ajax/banglophoc/"+ID,   
          function(data) { 
            $('#bang_lophoc').empty();
            $('#bang_lophoc').html(data);
          });
      });

      $("#tenkhoahoc").change(function(){
        $("#ngayhoc").change(function(){
          var ngayhoc = $(this).val();
          $("#buoihoc").change(function(){
             var buoihoc = $(this).val();
             $.get("{{ url('api/get_tenlop')}}", 
             { option: $("#tenkhoahoc").val() },  
              function(data) { 
                 $('#tenlop').val(data +" " + buoihoc + " " + ngayhoc);
              });
          });
        });
      });
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){

      $('.btnEdit').click(function(){
          $('.e-id').val($(this).parents("tr").find(".id").text()); 
          $('.e-tenlop').val($(this).parents("tr").find(".tenlop").text());
          $('.e-ngayhoc').val($(this).parents("tr").find(".ngayhoc").text().substr(4));
          $('.e-buoi').val($(this).parents("tr").find(".buoi").text());
          $('.e-thoigianhoc').val($(this).parents("tr").find(".thoigian").text());
          // $('#modalEdit').modal();

      });
    });
</script>
@endsection
@endif