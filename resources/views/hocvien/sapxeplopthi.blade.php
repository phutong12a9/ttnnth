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
            <option>--Chọn Khóa --</option>
            @foreach($khoa as $kh)
            <option value="{{$kh->ID}}">{{$kh->Ten}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div class="form-group">
          <select class="form-control" id="tenkhoa" style="width: 90%" name="tenkhoa">

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
        <table class="table table-striped table-responsive" id="bang_lophoc">
          
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
@endsection
@endif