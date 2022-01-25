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
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " style="margin-bottom: 20px;">
  <select class="form-control" id="filler-table">
    <option value="all">Tất cả</option>
    <option value="Đã Đóng Học Phí">Đã Đóng Học Phí</option>
    <option value="Chưa Đóng Học Phí">Chưa Đóng Học Phí</option>
  </select>
</div>
<table class="table table-striped table-responsive" id="banghocvien">
  <thead >
    <th width="40">Tất Cả<br><input type="checkbox" name="CheckBoxAll" id="CheckBoxAll"></th>
    <th>STT</th>
    <th hidden></th>
    <th>Tên Lớp</th>
    <th>Họ Tên</th>
    <th>Giới Tính</th>
    <th>Ngày Sinh</th>
    <th>Nơi Sinh</th>
    <th>SĐT</th>
    <th>Trạng Thái</th>
    <th>Thao Tác</th>
  </thead>
  <tbody>
    @foreach($lophoc as $lh)
    <tr>
      <td>@if($lh->TrangThai == "Đã Đóng Học Phí")
        <input type="checkbox" name="hocvien[]" class="checkbox" value="{{$lh->ID}}">
        @endif
      </td>
      <td></td>
      <td class="id" hidden>{{$lh->ID}}</td>
      <td class="lop">{{$lh->TenLop}}</td>
      <td class="hoten">{{$lh->HoTenHV}}</td>
      <td>{{$lh->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($lh->NgaySinh))}}</td>
      <td>{{$lh->NoiSinh}}</td>
      <td>{{$lh->SDT}}</td>
      <td>{{$lh->TrangThai}}</td>
      <td>
        <center>
          @if($lh->TrangThai == "Đã Đóng Học Phí" || $lh->TrangThai =="Đã Sắp Lớp Thi")
          <a  href="{{route('chi-tiet-bien-lai',$lh->ID)}}" class="chitiet"><i class="glyphicon glyphicon-eye-open"></i></a>
          @elseif($lh->TrangThai == "Chưa Đóng Học Phí")
          <a data-toggle="modal" href="#modalEdit" class="btnEdit"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a>
          @endif
        </center>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<!-- Bắt đầu modal-->
<div class="modal fade" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Nhập Biên Lai Học Phí</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('nhap-bien-lai-hoc-phi')}}" method="post" role="form" id='form-edit'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group" hidden>
              <label class="col-lg-4 control-label">ID</label>
              <div class="col-lg-8 ">
                <input type="text" name="e_id" class=" e-id form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Lớp</label>
              <div class="col-lg-8 ">
                <input type="text" name="e_lop" class=" e-lop form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Họ Tên</label>
              <div class="col-lg-8 ">
                <input type="text" name="hoten" class=" e-hoten form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Số Tiền</label>
              <div class="col-lg-8 ">
                <input type="text" name="sotien" class="e-hocphi form-control"  required="required"   placeholder='Số tiền'>
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
<!-- Bắt đầu modal chi tiet-->
<div class="modal fade" id="modalchitiet">

</div>
<!-- Kết Thúc Modal chitiet-->
<script type="text/javascript">
        $(document).ready(function(){
  
             // thay dổi trạng thái checkbox all
             $("#CheckBoxAll").change(function(){
                  var status = this.checked;
                  $('.checkbox').each(function(){ 
                    this.checked = status; 
                });

             });
             // kết thúc thay đổi trạng thái check all
             // checkbox lớp thay đổi thì checkbox all thay đổi
             $(".checkbox").change(function(){
                  if (this.checked == false) {
                    $("#CheckBoxAll")[0].checked = false;
                  }
                  // so sánh chiều dài check box để thay dổi trạng thái check box all
                  if ($('.checkbox:checked').length == $('.checkbox').length ){ 
                    $("#CheckBoxAll")[0].checked = true;  
                  }
             });
        });
    </script>
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
  //Lọc bảng lớp học
    $("#filler-table").on("change", function () {
      searchterm = $(this).val();
      $('#banghocvien tbody tr').each(function () {
          var sel = $(this);
          var txt = sel.find('td:eq(8)').text();
          if (searchterm != 'all') {
              if (txt.indexOf(searchterm) === -1) {
                  $(this).hide();
              }
              else {
                  $(this).show();
              }
          }
          else
          {
              $('#banghocvien tbody tr').show();
          }
      });
  });
});
    </script>
<script type="text/javascript">
    
    $(document).ready(function(){

      $('.btnEdit').click(function(){
          $('.e-id').val($(this).parents("tr").find(".id").text()); 
          $('.e-lop').val($(this).parents("tr").find(".lop").text());
          $('.e-hoten').val($(this).parents("tr").find(".hoten").text());
          // $('#modalEdit').modal();

      });

       $('.chitiet').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            $.ajax({
                url: URL

            }).done(function(results){
              console.log(results);
              $('#modalchitiet').html(results.html);
              $('#modalchitiet').modal({
                show: true
               });

            });

        });

    });
</script>