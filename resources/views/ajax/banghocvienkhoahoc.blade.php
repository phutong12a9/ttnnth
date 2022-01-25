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
<table class="table table-striped table-responsive" id="myTable">
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
<script type="text/javascript">
  $(document).ready(function() {
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