<div class="modal-dialog modal-lg">
<!-- Modal Header -->
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 class="modal-title"><center>Danh Sách Thi</center></h3>
    <!-- Modal body -->
    <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <th>STT</th>
            <th>SBD</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Nơi Sinh</th>
            <th>SĐT</th>
            <th>Email</th>
            {{-- <th>Thao Tác</th> --}}
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
              {{-- <td><center><a href="{{route('xoa-hoc-vien-lop-thi',$dst->SBD)}}" title="Xóa" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a></center></td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
        <br/>
    </div>
</div>
</div>
</div>
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