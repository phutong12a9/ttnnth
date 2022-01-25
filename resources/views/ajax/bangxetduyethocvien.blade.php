
  <div class="filler" style="margin-bottom: 20px;">
                          <select class="filler-table" id="filler-table">
                            <option value="all">Tất cả</option>
                            <option value="Đã duyệt">Đã duyệt</option>
                            <option value="Chờ duyệt">Chờ duyệt</option>
                            <option value="Không duyệt">Không duyệt</option>
                          </select>
                        </div>
   <table class="table table-striped table-responsive" id="table_hocvien">
                        
                     <thead >
    <tr>
      <th></th>
      <th>SBD</th>
      <th>Trạng Thái</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Ngày Kiểm Tra</th>
      <th>Kết Quả</th>
    </tr>
  </thead>
                      <tbody id="myTable">
    @foreach($xetduyet as $xetduyet)
    <tr>
      <td>
        <a href="{{route('xet-duyet-hoc-vien',$xetduyet->ID)}}" type="button" class="btn btn-default chitiethocvien">
          <i class="glyphicon glyphicon-eye-open"></i>
        </a>
      </td>
      <td>{{$xetduyet->SBD}}</td>
      <td id="tt" style="font-weight: bold"><br>
        @if($xetduyet->XetDuyet == 'Chờ duyệt')
        <span class="fa fa-circle" style="color: yellow"></span> &nbsp {{$xetduyet->XetDuyet}}
        @elseif($xetduyet->XetDuyet == 'Đã duyệt')
        <span class="fa fa-circle" style="color: green"></span> &nbsp {{$xetduyet->XetDuyet}}
        @elseif($xetduyet->XetDuyet == 'Không duyệt')
        <span class="fa fa-circle" style="color: red"></span>&nbsp {{$xetduyet->XetDuyet}}
        @endif
      </td>
      <td>{{$xetduyet->HoTenHV}}</td>
      <td>{{$xetduyet->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($xetduyet->NgaySinh))}}</td>
      <td>{{$xetduyet->NoiSinh}}</td>
      <td>{{date('d/m/Y', strtotime($xetduyet->NgayThi))}}</td>
      <td>{{$xetduyet->KetQua}}</td>
    </tr>
    @endforeach
  </tbody>
                    </table>    

  
<!-- Bắt đầu Modal chi tiết học viên-->

<div class="modal fade" id="modalchitiet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 
 <!-- Kết Thúc Modal Chi tiết học viên-->
</div>

  <script type="text/javascript">
        $(document).ready(function(){
            $('.chitiethocvien').click(function(event){
                event.preventDefault();
                let $this = $(this);
                let URL = $this.attr('href');
                $.ajax({
                    url: URL

                }).done(function(results){
                  $('#modalchitiet').html(results.html);
                  $('#modalchitiet').modal({
                    show: true
                   });

                });
              
            });
          
        });
    </script>   
    <script type="text/javascript">
      $(document).ready(function() {
        //Lọc bảng lớp học
          $("#filler-table").on("change", function () {
            searchterm = $(this).val();                 
            $('#table_hocvien tbody tr').each(function () {                    
                var sel = $(this);
                var txt = sel.find('td:eq(2)').text();
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
                    $('#table_hocvien tbody tr').show();
                }
            });
        });
      });
    </script>    
                           