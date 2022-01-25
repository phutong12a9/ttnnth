@extends('master')
@section('content')
@if(session()->has('hocvien'))
<title>Xem điểm</title>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="panel panel-default">
    <div class="panel-heading" style="font-size: 18px;">
      Xem Điểm
    </div>
    <div class="panel-body">
      
@foreach($loaichungchi as $loaichungchi)
@if($loaichungchi->TenChungChi=="TOEIC")
<table class="table table-striped table-responsive" id="myTable">
  <thead>
    <tr>
      <th>SBD</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Điểm Nghe</th>
      <th>Điểm Đọc</th>
      <th>Kết Quả</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hocvien as $hocvien)
    <tr>
      <td>{{$hocvien->SBD}}</td>
      <td>{{$hocvien->HoTenHV}}</td>
      <td>{{$hocvien->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
      <td>{{$hocvien->NoiSinh}}</td>
      <td>{{$hocvien->DiemNghe}}</td>
      <td>{{$hocvien->DiemDoc}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($loaichungchi->TenChungChi=="IELTS")
<table class="table table-striped table-responsive" id="myTable">
  <thead>
    <tr>
      <th>SBD</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Điểm Nghe</th>
      <th>Điểm Nói</th>
      <th>Điểm Đọc</th>
      <th>Điểm Viết</th>
      <th>Kết Quả</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hocvien as $hocvien)
    <tr>
      <td>{{$hocvien->SBD}}</td>
      <td>{{$hocvien->HoTenHV}}</td>
      <td>{{$hocvien->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
      <td>{{$hocvien->NoiSinh}}</td>
      <td>{{$hocvien->DiemNghe}}</td>
      <td>{{$hocvien->DiemNoi}}</td>
      <td>{{$hocvien->DiemDoc}}</td>
      <td>{{$hocvien->DiemViet}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($loaichungchi->TenChungChi=="Tin học")
<table class="table table-striped table-responsive" id="myTable">
  <thead>
    <tr>
      <th>SBD</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Điểm Lý Thuyết</th>
      <th>Điểm Thực Hành</th>
      <th>Kết Quả</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hocvien as $hocvien)
    <tr>
      <td>{{$hocvien->SBD}}</td>
      <td>{{$hocvien->HoTenHV}}</td>
      <td>{{$hocvien->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
      <td>{{$hocvien->NoiSinh}}</td>
      <td>{{$hocvien->DiemLyThuyet}}</td>
      <td>{{$hocvien->DiemThucHanh}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endforeach
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myTable").DataTable({
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
@endif
@endsection