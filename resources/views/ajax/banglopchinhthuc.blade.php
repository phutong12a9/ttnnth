<table class="table table-striped table-responsive" id="banghocvien">
  <thead >
    <th>STT</th>
    <th>Họ Tên</th>
    <th>Giới Tính</th>
    <th>Ngày Sinh</th>
    <th>Nơi Sinh</th>
    <th>SĐT</th>
    <th>Email</th>
    <th>Thao tác</th>
  </thead>
  <tbody>
    @foreach($lophoc as $lh)
    <tr>
      <td></td>
      <td>{{$lh->HoTenHV}}</td>
      <td>{{$lh->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($lh->NgaySinh))}}</td>
      <td>{{$lh->NoiSinh}}</td>
      <td>{{$lh->SDT}}</td>
      <td>{{$lh->Email}}</td>
      <td><center><a href="" title="Xóa" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a></center></td>
    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function($) {
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