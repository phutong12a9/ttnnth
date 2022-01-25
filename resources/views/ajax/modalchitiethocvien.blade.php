<!-- Bắt đầu Modal chi tiết học viên-->
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <!-- Bắt đầu moadl header chi tiết học viên-->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!-- Kết thúc modal header  chi tiết học viên -->
    <!-- Bắt đầu Modal Body chi tiết học viên -->
    <div class="modal-body" id="">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" role="form" id="form_xetduyethocvien">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên đơn vị quản lý</label>
              <label class="col-lg-8 "> Trung Tâm Ngoại Ngữ - Tin Học</label>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Khóa</label>
              <div class="col-lg-8">
                <select id="ct_tenvanbang" name="ct_tenvanbang" class="form-control" disabled="true">
                  @foreach($chitiethocvien as $chitiethocvien)
                  <option value="{{$chitiethocvien->ID}}">{{$chitiethocvien->TenLop}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group" hidden="true">
              <label class="col-lg-4 control-label">ID</label>
              <div class="col-lg-8">
                @foreach($idhocvien as $hocvien)
                <input type="text" name="ct_id" class="form-control" value="{{$hocvien->ID}}" readonly>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Họ tên người được cấp</label>
              <div class="col-lg-8">
                <input type="text" name="ct_hoten" class="form-control" placeholder="Nhập họ tên" value="{{$chitiethocvien->HoTenHV}}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giới tính</label>
              <div class="col-lg-8">
                <select id="ct_gioitinh" name="ct_gioitinh" class="form-control" style="width: 40%" readonly>
                  <option value="{{$chitiethocvien->GioiTinh}}">{{$chitiethocvien->GioiTinh}}</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày sinh</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="ct_ngaysinh"></i></span>
                  <input type="text" name="ct_ngaysinh" id="ct_ngaysinh" class="form-control" style="width: 40%" placeholder="Nhập ngày sinh" value="{{date('d/m/Y', strtotime($chitiethocvien->NgaySinh))}}" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Nơi sinh</label>
              <div class="col-lg-8 ">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                  <select name= "ct_noisinh" class="form-control" id="chitietnoisinh" readonly>
                    <option value="{{$chitiethocvien->NoiSinh}}" >{{$chitiethocvien->NoiSinh}}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày kiểm tra</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="ct_ngaykt"></i></span>
                  <input type="text" name="ct_ngaykt" id="ct_ngaykt" class="form-control" style="width: 40%"value="{{date('d/m/Y', strtotime($chitiethocvien->NgayThi))}}" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Kết Quả</label>
              <div class="col-lg-8">
                <input type="text" name="ct_xeploai" class="form-control" placeholder="Kết Quả" value="{{$chitiethocvien->KetQua}}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày ký</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="ct_ngayky"></i></span>
                  <input type="date" name="ct_ngayky" id="ct_ngayky" class="form-control"style="width: 40%"value="{{$chitiethocvien->NgayKy}}" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Số hiệu</label>
              <div class="col-lg-8">
                <input type="text" name="ct_sohieu" class="form-control" placeholder="Số hiệu" value="{{$chitiethocvien->SoHieu}}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Số vào sổ</label>
              <div class="col-lg-8">
                <input type="text" name="ct_sovaoso" class="form-control" placeholder="Số vào sổ" value="{{$chitiethocvien->SoVaoSo}}" required>
              </div>
            </div>
            <div class="form-group pull-right">
              @if($kiemtraduyet->XetDuyet=="Đã duyệt" || $kiemtraduyet->XetDuyet == "Không duyệt")
              @else
              <input type="submit" name="Luu" formaction="{{route('cap-nhat-van-bang')}}" value="Lưu" class="btn btn-primary">
              @endif
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Kết thúc Modal Body chi tiết học viên -->
  </div>
</div>
<!-- Kết Thúc Modal Chi tiết học viên-->