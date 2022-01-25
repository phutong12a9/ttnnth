@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Nhập Điểm</title>
<style type="text/css">
  #table table{
    width: 100%;
  }
  #table table tr{
    border: 1px solid;
    text-align: center;
  }
  #table table tr td{
    border: 1px solid
  }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<center><h3>Nhập Điểm Học Viên</h3></center>
	<form class="form-horizontal" method="post" action="{{route('nhap-diem-export')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="panel panel-default">
		<div class="panel-body" style="line-height: 20px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				        <div class="form-group">
				          <select id="chungchi" class="form-control" style="width: 95%" name="chungchi">
				           <option>--Chọn Chứng Chỉ --</option>
				            @foreach($chungchi as $cc)
				            <option value="{{$cc->ID}}"
				            	@if($loaichungchi->ID == $cc->ID) selected @endif>{{$cc->TenChungChi}}</option>
				            @endforeach
				          </select>
				        </div>
				      </div>
				      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				        <div class="form-group">
				          <select class="form-control" id="lopthi" style="width: 95%" name="lopthi">
				          		@foreach($lopthi as $lt)
				          		<option value="{{$lt->ID}}" >{{$lt->TenLopThi}}</option>
				          		@endforeach
				          </select>
				        </div>
				      </div>
				      <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
				        <div class="form-group pull-left">
				          <input type="button" name="btnLoc" class="btn btn-default" value="Lọc" id="btnLoc">
				        </div>
				      </div>
				      <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7"  id="tt">
								<div class="form-group" >
									<select class="form-control" id="trangthai" name="trangthai" style="width: 60%;" >
										<option value="Chưa Nhập Điểm">Chưa Nhập Điểm</option>
										<option value="Đã Nhập Điểm">Đã Nhập Điểm</option>
									</select>
								</div>
							</div>
				      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="Nhapdiemexport">
				        <div class="form-group pull-right">
				          <input type="submit" name="Nhapdiemexport"  value="Xuất Excel" class="btn btn-md btn-success" >
				        </div>
				      </div>
				      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="Nhapdiemexcel">
				        <div class="form-group pull-right">
				          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNhapDiemExcel" style="margin-bottom: 20px;">Nhập Điểm Excel</button>
				        </div>
				      </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div id="banghocvien">
		@foreach($loailophoc as $loailophoc)
		@if($loailophoc->TenChungChi=="IELTS")
		<table class="table table-striped table-responsive" id="myTable">
		  <thead>
		    <tr>
		      <th>SBD</th>
		      <th>Họ Tên</th>
		      <th>Giới Tính</th>
		      <th>Ngày Sinh</th>
		      <th>Nơi Sinh</th>
		      <th>Điểm Nghe</th>
		      <th>Điểm Nói</th>
		      <th>Điểm Đọc</th>
		      <th>Điểm Viết</th>
		      <th>Kết Quả</th>
		      <th>Ghi Chú</th>
		      <th>Thao Tác</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($hocvien as $hocvien)
		    <tr>
		      <td class="sbd">{{$hocvien->ID}}</td>
		      <td class="hoten">{{$hocvien->HoTenHV}}</td>
		      <td class="gioitinh">{{$hocvien->GioiTinh}}</td>
		      <td class="ngaysinh">{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
		      <td class="noisinh">{{$hocvien->NoiSinh}}</td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td><button class="btn btn-success btnSelect">Nhập Điểm</button></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		@elseif($loailophoc->TenChungChi=="TOEIC")
		<table class="table table-striped table-responsive" id="myTable">
		  <thead>
		    <tr>
		      <th>SBD</th>
		      <th>Họ Tên</th>
		      <th>Giới Tính</th>
		      <th>Ngày Sinh</th>
		      <th>Nơi Sinh</th>
		      <th>Điểm Nghe</th>
		      <th>Điểm Đọc</th>
		      <th>Kết Quả</th>
		      <th>Ghi Chú</th>
		      <th>Thao Tác</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($hocvien as $hocvien)
		    <tr>
		      <td class="sbd">{{$hocvien->ID}}</td>
		      <td class="hoten">{{$hocvien->HoTenHV}}</td>
		      <td class="gioitinh">{{$hocvien->GioiTinh}}</td>
		      <td class="ngaysinh">{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
		      <td class="noisinh">{{$hocvien->NoiSinh}}</td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td><button class="btn btn-success btnSelect">Nhập Điểm</button></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		@elseif($loailophoc->TenChungChi=="Tin học")
		<table class="table table-striped table-responsive" id="myTable">
		  <thead>
		    <tr>
		      <th>SBD</th>
		      <th>Họ Tên</th>
		      <th>Giới Tính</th>
		      <th>Ngày Sinh</th>
		      <th>Nơi Sinh</th>
		      <th>Điểm Lý Thuyết</th>
		      <th>Điểm Thực Hành</th>
		      <th>Kết Quả</th>
		      <th>Ghi Chú</th>
		      <th>Thao Tác</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($hocvien as $hocvien)
		    <tr>
		      <td class="sbd">{{$hocvien->ID}}</td>
		      <td class="hoten">{{$hocvien->HoTenHV}}</td>
		      <td class="gioitinh">{{$hocvien->GioiTinh}}</td>
		      <td class="ngaysinh">{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
		      <td class="noisinh">{{$hocvien->NoiSinh}}</td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td><button class="btn btn-success btnSelect">Nhập Điểm</button></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		@endif
		@endforeach
		<!-- Modal Nhập Điểm -->
		<div id="modalNhapDiem" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <center><h3 class="modal-title">Nhập Điểm</h3></center>
		      </div>
		      <div class="modal-body">
		        <div class="panel panel-default">
		          <div class="panel-body">
		            <form method="post" action="{{route('post-nhap-diem')}}" enctype="multipart/form-data" class="form-horizontal" id="form-nhapdiem">
		              <input type="hidden" name="_token" value="{{csrf_token()}}">
		              <div class="form-group">
		                <label class="col-lg-4 control-label">SBD</label>
		                <div class="col-lg-6">
		                  <input type="text" name="sbd" class="form-control md_sbd" readonly>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Họ Tên</label>
		                <div class="col-lg-6">
		                  <input type="text" name="hoten" class="form-control md_hoten" readonly>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Giới Tính</label>
		                <div class="col-lg-6">
		                  <input type="text" name="gioitinh" class="form-control md_gioitinh" readonly>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Ngày Sinh</label>
		                <div class="col-lg-6">
		                  <input type="text" name="ngaysinh" class="form-control md_ngaysinh" readonly>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Nơi Sinh</label>
		                <div class="col-lg-6">
		                  <input type="text" name="noisinh" class="form-control md_noisinh" readonly>
		                </div>
		              </div>
		              @if($loailophoc->TenChungChi=="TOEIC")
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Nghe</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemnghe" class="form-control md_diemnghe" required>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Đọc</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemdoc" class="form-control md_diemdoc" required>
		                </div>
		              </div>
		              @elseif($loailophoc->TenChungChi=="Tin học")
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Lý Thuyết</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemlythuyet" class="form-control md_diemlythuyet" required>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Thực Hành</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemthuchanh" class="form-control md_diemthuchanh" required>
		                </div>
		              </div>
		               @elseif($loailophoc->TenChungChi=="IELTS")
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Nghe</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemnghe" class="form-control md_diemnghe" required>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Nói</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemnoi" class="form-control md_diemnoi" required>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Đọc</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemdoc" class="form-control md_diemdoc" required>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Viết</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemviet" class="form-control md_diemviet" required>
		                </div>
		              </div>
		              @elseif($loailophoc->TenChungChi=="Tin học")
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Lý Thuyết</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemlythuyet" class="form-control md_diemlythuyet" required>
		                </div>
		              </div>
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Điểm Thực Hành</label>
		                <div class="col-lg-6">
		                  <input type="text" name="diemthuchanh" class="form-control md_diemthuchanh" required>
		                </div>
		              </div>
		              @endif
		              <div class="form-group">
		                <label class="col-lg-4 control-label">Ghi Chú</label>
		                <div class="col-lg-6">
		                  <input type="text" name="ghichu" class="form-control md_ghichu">
		                </div>
		              </div>
		              <div class="form-group">
		                <button type="submit" class="btn btn-success pull-right" id="btnNhapDiem">Nhập Điểm</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div id="modalNhapDiemExcel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Nhập Điểm</h4></center>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="post" action="{{route('nhap-diem-import')}}" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class="col-lg-2 control-label">Tên Chứng Chỉ</label>
                <div class="col-lg-10">
                  <select class="form-control" name="tenchungchi" id="tenchungchi" required>
                    <option value="">--Chọn chứng chỉ--</option>
                    @foreach($chungchi as $cc)
                    <option value="{{$cc->TenChungChi}}">{{$cc->TenChungChi}}</option>
                    @endforeach
                  </select>
                  <div class="err" style="color: red;" hidden>
                  	
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                  <input type="file" name="file" class="form-control" accept=".xlsx" id="file-excel" required>
                </div>
              </div>
              <div id="table">

              </div>
              <hr>
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" id="btnNhapDiemExcel">Nhập Điểm</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script type="text/javascript">
	$(document).ready(function(){

      $("#tenlop").change(function(){

      	$('#trangthai option').prop('selected', function() {
        return this.defaultSelected;
    	});

        let ID = $("#tenlop").val();
        $.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
                    $("#banghocvien").html(data);
                });
        $("#trangthai").change(function(){
        let trangthai = $("#trangthai").val();
	        if (trangthai == "Chưa Nhập Điểm") {
	        	$.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }
	        if(trangthai == "Đã Nhập Điểm"){
	        	$.get("ajax/hocvienlophoc/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }

	      });
      });


  });
</script>
 --}}
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
 <script type="text/javascript">
  $(document).ready(function(){
       $("#chungchi").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenlopthi/"+ID, function(data){
          $('#lopthi').html(data);
          $('#tt').hide();
          $('#Nhapdiemexport').hide();
          $('#Nhapdiemexcel').hide();
        });
      });

        $("#trangthai").change(function(){
        	let ID = $('#lopthi').val();
        let trangthai = $("#trangthai").val();
	        if (trangthai == "Chưa Nhập Điểm") {
	        	$.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }
	        if(trangthai == "Đã Nhập Điểm"){
	        	$.get("ajax/hocviendanhapdiem/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }

	      });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
	 $('#btnLoc').click(function(){
	        var ID = $('#lopthi').val();
	          window.location= 'ajax/nhapdiem/'+ID;
	        
	       });
	});
</script>
<script lang="javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script type="text/javascript" charset="UTF-8" >


      $("#file-excel").change(function(e){
        $('#table').empty();
       var reader = new FileReader();
        reader.readAsArrayBuffer(e.target.files[0]);
        reader.onload = function(e) {
        var data = new Uint8Array(reader.result);
        var wb = XLSX.read(data,{type:'array'});
        var htmlstr = XLSX.write(wb,{sheet:"Sheet1", type:'string',bookType:'html'});
        console.log(htmlstr);
        $('#table').empty();
        $('#table')[0].innerHTML += htmlstr;
        console.log($('#table')[0]);
        }
      });
</script>
<script type="text/javascript">
   $(document).ready(function(){

    $("#btnImportDiem").click(function(e){
      let lophoc = $("#lophoc").val();
      if (lophoc == "null") {
        alert("Bạn chưa chọn lớp học.");
        e.preventDefault();
      }    
      });          
    });
</script>
<script type="text/javascript">
    
    $(document).ready(function(){

      $('.btnSelect').click(function(){
          $('.md_sbd').val($(this).parents("tr").find(".sbd").text()); 
          $('.md_hoten').val($(this).parents("tr").find(".hoten").text());
          $('.md_gioitinh').val($(this).parents("tr").find(".gioitinh").text());
          $('.md_ngaysinh').val($(this).parents("tr").find(".ngaysinh").text());
          $('.md_noisinh').val($(this).parents("tr").find(".noisinh").text());  
          $('#modalNhapDiem').modal();

      });

    });
</script>
<script>
  $(document).ready(function() {
    $("#form-nhapdiem").validate({
      rules: {
        diemnghe: {   
          required: true, 
          number : true, 
        },
        diemnoi: {
          required: true, 
          number : true, 
        },
        diemdoc: { 
         required: true, 
          number : true, 
        },
        diemviet : { 
          required: true, 
          number : true, 
        },
        diemlythuyet : {
          required: true, 
          number : true, 
          min :  0,
          max : 10

        },
        diemthuchanh : {
          required: true, 
          number : true, 
          min :  0,
          max : 10

        },
      },
      messages: {
        diemnghe: {
          required: "Xin vui lòng nhập điểm nghe ",
          number: "Điểm nghe phải là kiểu số"
          },
        diemnoi: {
          required: "Xin vui lòng nhập điểm nói ",
          number: "Điểm nói phải là kiểu số"
          },
        diemdoc: {
          required: "Xin vui lòng nhập điểm đọc ",
          number: "Điểm đọc phải là kiểu số"
          },
        diemviet: {
          required: "Xin vui lòng nhập điểm viết",
          number: "Điểm viết phải là kiểu số",
          },
        diemlythuyet: {
          required: "Xin vui lòng nhập điểm lý thuyết ",
          number: "Điểm lý thuyết phải là kiểu số",
          min: "Điểm lý thuyết phải lớn hơn 0",
          max: "Điểm lý thuyết phải nhỏ hơn 10"
          },
        diemthuchanh: {
          required: "Xin vui lòng nhập điểm thực hành ",
          number: "Điểm thực hành phải là kiểu số",
          min: "Điểm thực hành phải lớn hơn 0",
          max: "Điểm thực hành phải nhỏ hơn 10"
          },
      }
    });
  });
</script>
@endsection
@endif