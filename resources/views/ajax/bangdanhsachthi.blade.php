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
<table class="table table-striped table-responsive" id="myTable">
  <thead>
    <th>STT</th>
    <th>SBD</th>
    <th>Họ Tên</th>
    <th>Giới Tính</th>
    <th>Ngày Sinh</th>
    <th>Nơi Sinh</th>
    <th>SĐT</th>
    <th>Email</th>
    <th>Thao Tác</th>
  </thead>
  <tbody>
    @foreach($danhsachthi as $dst)
    <tr>
      <td></td>
      <td>{{$dst->SBD}}</td>
      <td>{{$dst->HoTenHV}}</td>
      <td>{{$dst->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($dst->NgaySinh))}}</td>
      <td>{{$dst->NoiSinh}}</td>
      <td>{{$dst->SDT}}</td>
      <td>{{$dst->Email}}</td>
      <td><center><a href="{{route('xoa-hoc-vien-lop-thi',$dst->SBD)}}" title="Xóa" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a></center></td>
    </tr>
    @endforeach
  </tbody>
</table>
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