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

  table tr td:nth-child(2)::before {
    content: counter(row-num);
  }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Nhập Biên Lai Học Phí</h3></center>
  <div class="panel panel-default">
      <div class="panel-body" style="line-height: 20px;">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <div class="form-group">
            <select id="khoahoc" class="form-control" style="width: 90%">
              <option value="">--Chọn Khóa --</option>
              @foreach($khoa as $kh)
              <option value="{{$kh->ID}}">{{$kh->Ten}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="form-group">
            <select class="form-control" id="tenkhoa" style="width: 90%">

            </select>
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="form-group">
            <select id="tenlophoc" class="form-control" style="width: 90%" >
              <option value=""></option>
            </select>
          </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <div class="form-group">
            <input type="button" value="Lọc" class="btn btn-default" id="btnLoc">
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
        <table class="table table-striped table-responsive" id="banghocvien">
          <thead >
            <th width="40">Tất Cả<br><input type="checkbox" name="CheckBoxAll" id="CheckBoxAll"></th>
            <th>STT</th>
            <th hidden></th>
            <th>Tên Lớp</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Nơi Sinh</th>
            <th>SĐT</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>
          </thead>
          <tbody>
            @foreach($lophoc as $lh)
            <tr>
              <td>@if($lh->TrangThai == "Đã Đóng Học Phí")
                <input type="checkbox" name="hocvien[]" class="checkbox" value="{{$lh->ID}}">
                @endif
              </td>
              <td></td>
              <td class="id" hidden>{{$lh->ID}}</td>
              <td class="lop">{{$lh->TenLop}}</td>
              <td class="hoten">{{$lh->HoTenHV}}</td>
              <td>{{$lh->GioiTinh}}</td>
              <td>{{date('d/m/Y', strtotime($lh->NgaySinh))}}</td>
              <td>{{$lh->NoiSinh}}</td>
              <td>{{$lh->SDT}}</td>
              <td>{{$lh->TrangThai}}</td>
              <td>
                <center>
                  @if($lh->TrangThai == "Đã Đóng Học Phí" || $lh->TrangThai =="Đã Sắp Lớp Thi")
                  <a  href="{{route('chi-tiet-bien-lai',$lh->ID)}}" class="chitiet"><i class="glyphicon glyphicon-eye-open"></i></a>
                  @elseif($lh->TrangThai == "Chưa Đóng Học Phí")
                  <a data-toggle="modal" href="#modalEdit" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a>
                  @endif
                </center>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
        <!-- Bắt đầu modal chi tiet-->
        <div class="modal fade" id="modalchitiet">

        </div>
        <!-- Kết Thúc Modal chitiet-->
      </div>
    </div>
  </form>
</div>
<!--Kết thúc body-->
<!-- Bắt đầu modal-->
        <div class="modal fade" id="modalEdit">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Nhập Biên Lai Học Phí</h3>
                <!-- Modal body -->
                <div class="modal-body">
                  <form class="form-horizontal" action="{{route('nhap-bien-lai-hoc-phi')}}" method="post" role="form" id='form-edit'>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group" hidden>
                      <label class="col-lg-4 control-label">ID</label>
                      <div class="col-lg-8 ">
                        <input type="text" name="e_id" class=" e-id form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">Lớp</label>
                      <div class="col-lg-8 ">
                        <input type="text" name="e_lop" class=" e-lop form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">Họ Tên</label>
                      <div class="col-lg-8 ">
                        <input type="text" name="hoten" class=" e-hoten form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-4 control-label">Số Tiền</label>
                      <div class="col-lg-8 ">
                        <input type="text" name="sotien" class="e-hocphi form-control"  required="required"   placeholder='Số tiền'>
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
  $(document).ready(function(){
    $("#banghocvien").DataTable({
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
       $("#khoahoc").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoa').html(data);
           let ID_tenkhoa = $('#tenkhoa :selected').val();
           $.get("ajax/tenlop/"+ID_tenkhoa, function(data){
            $('#tenlophoc').html(data);
          });
        });
      });

      $("#tenkhoa").change(function(){
        let ID = $("#tenkhoa").val();
        $.get("ajax/tenlop/"+ID,   
          function(data) { 
            $('#tenlophoc').html(data);
          });
      });
      $('#btnLoc').click(function(){
        var ID = $('#tenlophoc').val();
        window.location= 'ajax/sapxeplophoc/'+ID;
       });
  });
</script>
<script type="text/javascript">
    
    $(document).ready(function(){

      $('.btnEdit').click(function(){
          $('.e-id').val($(this).parents("tr").find(".id").text()); 
          $('.e-lop').val($(this).parents("tr").find(".lop").text());
          $('.e-hoten').val($(this).parents("tr").find(".hoten").text());
          // $('#modalEdit').modal();

      });
       $('.chitiet').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            $.ajax({
                url: URL

            }).done(function(results){
              console.log(results);
              $('#modalchitiet').html(results.html);
              $('#modalchitiet').modal({
                show: true
               });

            });

        });

        $('#btnLoc').click(function(){
        var ID = $('#tenlophoc').val();
        var khoahoc = $('#khoahoc').val();
        var tenkhoa = $('#tenkhoa').val();
        if(ID ==""){
          alert('Vui lòng điền đầy đủ các trường');

        }
        else{
          window.location= 'ajax/sapxeplophoc/'+ID;
        }
      });
        

    });
</script>
@endsection
@endif