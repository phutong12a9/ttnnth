@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Sắp xếp lớp thi</title>
<form class="form-horizontal" action="" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Sắp Xếp Lớp Thi</h3></center>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="form-group">
          <select id="khoahoc" class="form-control" style="width: 90%">
            @foreach($khoa as $kh)
            <option value="{{$kh->ID}}"
              @if($check_khoa->ID == $kh->ID) selected @endif>{{$kh->Ten}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div class="form-group">
          <select class="form-control" id="tenkhoa" style="width: 90%" name="tenkhoa">
            <option value="{{$check_khoahoc->ID}}">{{$check_khoahoc->TenKhoa}}</option>
          </select>
        </div>
      </div>
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="form-group">
          <input type="button" name="btnLoc" id="btnLoc" value="Lọc" class="btn btn-default">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
      <div id="body_banglophoc">
        <div class="btnChucNang" style="padding-bottom: 20px;">
          <button type="button" class="btn btn-warning" id="btn_ADD"><i class="glyphicon glyphicon-plus"></i>Thêm Vào Lớp Thi</button>
        </div>
        <div class="col-lg-12" id="ThemVaoLop" hidden="true">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label class="col-lg-4 control-label">Chọn Lớp Thi</label>
                <div class="col-lg-6">
                  <select class="form-control" name="tenlopthi" id="tenlopthi">
                    @foreach($lopthi as $lt)
                    <option value="{{$lt->ID}}">{{$lt->TenLopThi}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                  <input type="submit" formaction="{{route('them-hoc-vien-lop-thi')}}" name="btn_Them" class="btn btn-success pull-right" id="btn_Them" value="Thêm">
                </div>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped table-responsive" id="bang_lophoc">
          <thead>
            <th width="40">Tất Cả<br><input type="checkbox" name="CheckBoxAll" id="CheckBoxAll"></th>
            <th>STT</th>
            <th>Lớp</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Nơi Sinh</th>
            <th>SĐT</th>
            <th>Trạng Thái</th>
          </thead>
          <tbody>
            @foreach($khoahoc as $kh)
            <tr>
              @if($kh->TrangThai == "Đã Sắp Lớp")
              <td><input type="checkbox" name="hocvien[]" class="checkbox" value="{{$kh->ID}}"></td>
              @else
              <td></td>
              @endif
              <td></td>
              <td>{{$kh->TenLop}}</td>
              <td>{{$kh->HoTenHV}}</td>
              <td>{{$kh->GioiTinh}}</td>
              <td>{{date('d/m/Y', strtotime($kh->NgaySinh))}}</td>
              <td>{{$kh->NoiSinh}}</td>
              <td>{{$kh->SDT}}</td>
              <td>{{$kh->TrangThai}}</td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
</div>
</form>
<!--Kết thúc body-->
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
      $(document).ready(function(){
            $('#btn_ADD').click(function(){
              $('#ThemVaoLop').slideToggle("slow");
            });

             
        });
    </script>
<script type="text/javascript">
   $(document).ready(function(){

    $("#btn_Them").click(function(e){
      let lophp = $("#hocphan").val();
      if (lophp == "null") {
        alert("Bạn chưa chọn lớp học phần.");
        e.preventDefault();
      } 
      if ($(".checkbox:checked").length == 0) {
          alert("Bạn chưa chọn học viên nào.");
          e.preventDefault();
        }
       
      });         
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){

      let ID_Khoa = $('#khoahoc :selected').val();
        $.get("ajax/tenkhoahoc/"+ID_Khoa, function(data){
          $('#tenkhoa').append(data);
        });

       $("#khoahoc").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoa').html(data);
        });
      });
        $('#btnLoc').click(function(){
        var ID = $('#tenkhoa').val();
          window.location= 'ajax/sapxeplopthi/'+ID;
        
       });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {

    // thay dổi trạng thái checkbox all
    $("#CheckBoxAll").change(function() {
      var status = this.checked;
      $('.checkbox').each(function() {
        this.checked = status;
      });

    });
    // kết thúc thay đổi trạng thái check all
    // checkbox lớp thay đổi thì checkbox all thay đổi
    $(".checkbox").change(function() {
      if (this.checked == false) {
        $("#CheckBoxAll")[0].checked = false;
      }
      // so sánh chiều dài check box để thay dổi trạng thái check box all
      if ($('.checkbox:checked').length == $('.checkbox').length) {
        $("#CheckBoxAll")[0].checked = true;
      }
    });
  });
</script>
@endsection
@endif