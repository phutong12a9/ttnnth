
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- Modal body -->
        <div class="modal-body">
        	@foreach($chitietbienlai as $ctbl)
          <div style="border: 1px solid; overflow: hidden;">
            <div class="pull-left" style="padding: 15px 20px">
              <p>Trường ĐH KT-CN Cần Thơ</p>
              <p>Trung tâm ngoại ngữ-tin học</p>
            </div>
            <div class="pull-right"style="padding: 15px 20px ">
              <p>Số: {{$ctbl->ID}}</p>
            </div>
            <div style="margin-top:90px">
              <center><h3>Biên Lai Thu Học Phí</h3></center>
            </div>
            <div>
              <center>Ngày {{date('d', strtotime($ctbl->NgayLap))}} Tháng {{date('m', strtotime($ctbl->NgayLap))}} Năm {{date('Y', strtotime($ctbl->NgayLap))}}</center>
            </div>
            <div style="padding: 15px 20px;line-height: 15px;">
              <p><b>Họ và tên người nộp:</b> &nbsp {{$ctbl->HoTenHV}}</p>
              <div>
                <span class="pull-left"><b>Lớp:</b> &nbsp {{$ctbl->TenLop}}</span>
                <span class="pull-right"><b>Khóa:</b> &nbsp {{$ctbl->TenKhoa}}</span>
              </div>
              <br>
              <p style="padding-top: 15px;"><b>Ngày học:</b> &nbsp {{date('d/m/Y', strtotime($ctbl->NgayKhaiGiang))}}</p>
              <p><b>Số tiền thu:</b> &nbsp {{number_format($ctbl->SoTien)}} VND</p>
              <div class="pull-right">
                <p><h4><b>Người Thu</b></h4></p>
                <p>&nbsp</p>
                <p></p>
                <p>{{$ctbl->HoTenCB}}</p>
              </div>
            </div>
          </div>
          @endforeach
          <br/>

        </div>
        <div class="modal-footer">
        	<button type="button" class=" btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>