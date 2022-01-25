@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Chứng Chỉ</title>
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
<style type="text/css">
  table {
    counter-reset: row-num;
  }

  table tbody tr {
    counter-increment: row-num;
  }

  table tr td:nth-child(3)::before {
    content: counter(row-num);
  }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background: white">
  <div class="pannel panel-default">
    <div class="panel-heading">
      <center><h3>Chứng Chỉ</h3></center>
    </div>
  </div>
  <button type="button" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;" data-toggle="modal" data-target="#themchungchi">
  <i class="glyphicon glyphicon-plus-sign"></i> Thêm
  </button>
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-striped table-responsive" id="table_chungchi">
        <thead >
          <tr style="background-color:#337ab7;color: white; font-size: 12px">
            <th hidden="true"></th>
            <th hidden="true"></th>
            <th>STT</th>
            <th>Tên Chứng Chỉ</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($chungchi as $cc)
          <tr class="onRow">
            <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true" class="id">{{$cc->ID}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true" class="id_dm">{{$cc->ID_DanhMuc}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)"></td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="tenchungchi">{{$cc->TenChungChi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">
              <center>
                <a data-toggle="modal" href="#editchungchi" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
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
<div class="modal fade" id="themchungchi">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Thêm Chứng Chỉ</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('post-chung-chi')}}" method="post" role="form" id='form-chung-chi'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Danh Mục</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="danhmuc">
                  @foreach($danhmuc as $dm)
                  <option value="{{$dm->ID}}">{{$dm->TenDanhMuc}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Chứng Chỉ</label>
              <div class="col-lg-8 ">
                <input type="text" name="tenchungchi" class="form-control"  required="required"   placeholder='Tên chứng chỉ'>
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
<!-- Bắt đầu modal Edit-->
<div class="modal fade" id="editchungchi">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Cập Nhật Chứng Chỉ</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('edit-chung-chi')}}" method="post" role="form" id='form-edit-chung-chi'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-lg-8 " hidden>
                <input type="text" class="e-id form-control" id="e-id" name="e_id" readonly>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Danh Mục</label>
              <div class="col-lg-8 ">
                <select class="form-control e-iddm" name="e_iddm">
                  @foreach($danhmuc as $danhmuc)
                  <option value="{{$danhmuc->ID}}">{{$danhmuc->TenDanhMuc}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Chứng Chỉ</label>
              <div class="col-lg-8 ">
                <input type="text" class="e-tenchungchi form-control" id="e-tenchungchi" name="e_tenchungchi" required="required"   placeholder='Tên chứng chỉ'>
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
     $("#table_chungchi").DataTable({
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
          $('.e-iddm').val($(this).parents("tr").find(".id_dm").text()); 
          $('.e-tenchungchi').val($(this).parents("tr").find(".tenchungchi").text());
          // $('#modalEdit').modal();

      });

    });
</script>
@endsection
@endif