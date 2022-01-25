
  <tbody id="myTable">
    @foreach($lophoc as $lh)
    <tr>
      <td></td>
      <td hidden="true" class="id">{{$lh->ID}}</td>
      <td class="tenlop">{{$lh->TenLop}}</td>
      <td class="ngayhoc">Thứ {{$lh->NgayHoc}}</td>
      <td class="buoi">{{$lh->BuoiHoc}}</td>
      <td class="thoigian">{{$lh->ThoiGianHoc}}</td>
      <td>
        <center>
                <a data-toggle="modal" href="#modalEdit" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
        </center>
      </td>
    </tr>
    @endforeach
  </tbody>