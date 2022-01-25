@if(session()->has('canbo'))
@extends('quantri')
@section('content')

<title>Lớp thi</title>
<style type="text/css">
  #table_lopthi {
    counter-reset: row-num;
  }

  #table_lopthi tbody tr {
    counter-increment: row-num;
  }

  #table_lopthi tr td:nth-child(2)::before {
    content: counter(row-num);
  }
</style>
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
      <center><h3>Lớp Thi</h3></center>
    </div>
  </div>
  <button type="button" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;" data-toggle="modal" data-target="#themlopthi">
  <i class="glyphicon glyphicon-plus-sign"></i> Thêm
  </button>
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-striped " id="table_lopthi">
        <thead >
          <tr style="background-color:#337ab7;color: white; font-size: 12px">
            <th hidden="true"></th>
            <th>STT</th>
            <th>Chứng Chỉ</th>
            <th>Tên Lớp Thi</th>
            <th>Ngưỡng Đạt</th>
            <th>Giám Thị</th>
            <th>Phòng</th>
            <th>Ngày Thi</th>
            <th>Buổi Thi</th>
            <th>Giờ Thi</th>
            <th>Thời Gian Làm</th>
            <th>Nội Dung Thi</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($lopthi as $lt)
          <tr class="onRow">
            <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true">{{$lt->ID}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)"></td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->TenChungChi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->TenLopThi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->NguongDat}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->HoTenGV}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->TenPhong}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($lt->NgayThi))}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->BuoiThi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->GioThi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lt->ThoiGianLam}} Phút</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">
              <a href="source/dethi/{{$lt->NoiDungThi}}" target="_blank">Xem</a>
            </td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">
              <center>
                <a href=""><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="{{route('modal-danh-sach-thi',$lt->ID)}}" title="Danh sách thi" class="danhsachthi"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;</a> &nbsp
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
<div class="modal fade" id="themlopthi">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Thêm Lớp Thi</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('post-lopthi')}}" enctype="multipart/form-data" method="post" role="form" id='form-phong'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Chứng Chỉ</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="chungchi" required>
                  <option value="">--Chọn chứng chỉ--</option>
                  @foreach($chungchi as $cc)
                  <option value="{{$cc->ID}}">{{$cc->TenChungChi}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giảng Viên</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="giangvien" required>
                  <option value="">--Chọn giảng viên--</option>
                  @foreach($giangvien as $gv)
                  <option value="{{$gv->ID}}">{{$gv->HoTenGV}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Phòng</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="phong" required>
                  <option value="">--Chọn phòng học--</option>
                 @foreach($phong as $p)
                  <option value="{{$p->ID}}">{{$p->TenPhong}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Lớp Thi *</label>
              <div class="col-lg-8 ">
                <input type="text" name="tenlopthi" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngưỡng Đạt *</label>
              <div class="col-lg-8 ">
                <input type="text" name="nguongdat" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày Thi *</label>
              <div class="col-lg-8 ">
                <input type="date" name="ngaythi" class="form-control" id="ngaythi" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Buổi Thi</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="buoithi">
                 <option value="Sáng">Sáng</option>
                 <option value="Chiều">Chiều</option>
                 <option value="Tối">Tối</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giờ Thi *</label>
              <div class="col-lg-8 ">
                <input type="time" name="giothi" class="form-control" id="giothi" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Thời Gian Làm *</label>
              <div class="col-lg-8 ">
                <input type="number" name="thoigianlam" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Nội Dung Thi</label>
              <div class="col-lg-8 ">
                <input type="file"  accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf" name="noidungthi" class="form-control">
              </div>
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            <br>
            <div>
              <b>* Các trường bắt buộc nhập</b>
            </div>
          </form>
          <br/>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Kết Thúc Modal-->
<!-- Bắt đầu Modal danh sách thi-->
<div class="modal fade" id="modalDanhsachthi">
  
</div>

  <!-- Kết Thúc Modal danh sách thi-->

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

      // $('.btnEdit').click(function(){
      //     $('.e-id').val($(this).parents("tr").find(".id").text()); 
      //     $('.e-lop').val($(this).parents("tr").find(".lop").text());
      //     $('.e-hoten').val($(this).parents("tr").find(".hoten").text());
      //     // $('#modalEdit').modal();

      // });

       $('.danhsachthi').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            $.ajax({
                url: URL

            }).done(function(results){
              console.log(results);
              $('#modalDanhsachthi').html(results.html);
              $('#modalDanhsachthi').modal({
                show: true
               });

            });

        });

    });
</script>
@endsection
@endif