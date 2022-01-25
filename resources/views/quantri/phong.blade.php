@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Phòng học</title>
<link rel="stylesheet" type="text/css" href="source/css/sttTable.css">
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">{{Session::get('themthanhcong')}}
</div>
@endif
@if(Session::has('loi'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">{{Session::get('loi')}}
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
      <center><h3>Phòng Học</h3></center>
    </div>
  </div>
  <button type="button" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;" data-toggle="modal" data-target="#themphong">
  <i class="glyphicon glyphicon-plus-sign"></i> Thêm
  </button>
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-striped table-responsive" id="table_phong">
        <thead >
          <tr style="background-color:#337ab7;color: white; font-size: 12px">
            <th hidden="true"></th>
            <th>STT</th>
            <th>Tên Phòng</th>
            <th>Dãy</th>
            <th>Lầu</th>
            <th>Phòng</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($phong as $p)
          <tr class="onRow">
            <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true" class="id">{{$p->ID}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)"></td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="ten">{{$p->TenPhong}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="day">{{$p->Day}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="lau">{{$p->Lau}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)" class="phong">{{$p->Phong}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">
              <center>
                <a data-toggle='modal' href="#editphong" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="{{route('xoa-phong',$p->ID)}}" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
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
<div class="modal fade" id="themphong">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Thêm Phòng</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('post-phong')}}" method="post" role="form" id='form-phong'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Dãy</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="day">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Lầu</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="lau">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Phòng</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="phong">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
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
<!-- Bắt đầu modal edit-->
<div class="modal fade" id="editphong">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Cập Nhật Phòng</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('edit-phong')}}" method="post" role="form" id='form-edit-phong'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group" hidden>
              <label class="col-lg-4"></label>
              <div class="col-lg-8">
                <input type="text" name="e_id" class="e-id" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên phòng</label>
              <div class="col-lg-8">
                <input type="text" name="e_ten" class="e-ten form-control"  readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Dãy</label>
              <div class="col-lg-8 ">
                <select class="e-day form-control" name="e_day" >
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Lầu</label>
              <div class="col-lg-8 ">
                <select class=" e-lau form-control" name="e_lau" >
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Phòng</label>
              <div class="col-lg-8 ">
                <select class="e-phong form-control" name="e_phong">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
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
     $("#table_phong").DataTable({
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
          $('.e-ten').val($(this).parents("tr").find(".ten").text());
          $('.e-day').val($(this).parents("tr").find(".day").text()); 
          $('.e-lau').val($(this).parents("tr").find(".lau").text());
          $('.e-phong').val($(this).parents("tr").find(".phong").text()); 
          // $('#modalEdit').modal();

      });

    });
</script>
@endsection
@endif