<!-- Bắt đầu Modal chi tiết học viên-->


                  <div class="modal-dialog modal-md">
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
                                <label class="col-lg-4 control-label">Tên văn bằng</label>
                                <div class="col-lg-8">
                                  <select id="xd_tenvanbang" name="xd_tenvanbang" class="form-control" readonly>
                                   @foreach($chitiethocvien as $chitiethocvien)
                                   <option value="{{$chitiethocvien->ID}}">{{$chitiethocvien->TenLop}}</option>
                                   @endforeach
                                  </select>
                                </div>
                              </div>
                               <div class="form-group" hidden="true">
                                <label class="col-lg-4 control-label">ID</label>
                                <div class="col-lg-8">
                                  @foreach($hocvien as $hocvien)
                                  <input type="text" name="xd_id" class="form-control" value="{{$hocvien->ID}}">
                                  @endforeach
                                </div>
                              </div>
                              <div class="form-group">
                              <label class="col-lg-4 control-label">Họ tên người được cấp</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_hoten" class="form-control" placeholder="Nhập họ tên" value="{{$chitiethocvien->HoTenHV}}" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Giới tính</label>
                              <div class="col-lg-8">
                               <select id="xd_gioitinh" name="xd_gioitinh" class="form-control" style="width: 40%" disabled="true">
                                <option value="{{$chitiethocvien->GioiTinh}}">{{$chitiethocvien->GioiTinh}}</option>
                               </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Ngày sinh</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="xd_ngaysinh"></i></span>
                                  <input type="date" name="xd_ngaysinh" id="xd_ngaysinh" class="form-control" style="width: 60%" placeholder="Nhập ngày sinh" value="{{$chitiethocvien->NgaySinh}}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Nơi sinh</label>
                              <div class="col-lg-8 ">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                  <select name= "xd_noisinh" class="form-control" id="chitietnoisinh" readonly>
                                  <option value="{{$chitiethocvien->NoiSinh}}" >{{$chitiethocvien->NoiSinh}}</option>
                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Ngày kiểm tra</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="xd_ngaykt"></i></span>
                                   <input type="text" name="xd_ngaykt" id="xd_ngaykt" class="form-control" style="width: 60%"value="{{date('d/m/Y', strtotime($chitiethocvien->NgayThi))}}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Kết Quả</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_xeploai" class="form-control" placeholder="Xếp loại" value="{{$chitiethocvien->KetQua}}" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Ngày ký</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="xd_ngayky"></i></span>
                                   <input type="date" name="xd_ngayky" id="xd_ngayky" class="form-control"style="width: 60%"value="{{$chitiethocvien->NgayKy}}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Số hiệu</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_sohieu" class="form-control" placeholder="Số hiệu" value="{{$chitiethocvien->SoHieu}}" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Số vào sổ</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_sovaoso" class="form-control" placeholder="Số vào sổ" value="{{$chitiethocvien->SoVaoSo}}" readonly>
                              </div>
                            </div>
                            </form>
                            <div class="pull-right">
                              <a href="{{route('in-van-bang',$hocvien->ID)}}" type="button" class="btn btn-info" id="btnCapphat">Cấp Phát</a>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>
                      </div>
                    </div>
                    <!-- Kết thúc Modal Body chi tiết học viên -->
                    </div>
                  </div>
             <!-- Kết Thúc Modal Chi tiết học viên-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnCapphat').click(function(event){
      event.preventDefault();
      let $this = $(this);
      let URL = $this.attr('href');
      $.ajax({
          url: URL

      }).done(function(results){
      var WinPrint = window.open('','','left=0,top=0,width=1200,height=1200');
      WinPrint.document.write(results.html);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();

      });
    });
  });
</script>