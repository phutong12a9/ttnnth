<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> <!-- CSS Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- CDn Jquery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <!-- CDN Boostrap -->
<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th colspan="5"  style="height: 60px; font-weight: bold; font-size: 14px;" align="center">UBND THÀNH PHỐ CẦN THƠ<br>TRƯỜNG ĐẠI HỌC KT - CN CẦN THƠ</th>
			<th colspan="6"  style="height: 60px; font-weight: bold; font-size: 14px;" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>Độc lập - Tự do - Hạnh phúc</th>
		</tr>
		<tr>
			<th colspan="9"style="font-weight: bold; font-size: 14px;" align="center">Lớp Chứng Chỉ Tiếng Anh trình Độ A</th>
		</tr>
		<tr >
			<th style="font-weight: bold;font-size: 14px;">SBD</th>
			<th style="font-weight: bold;font-size: 14px;">Họ Tên</th>
			<th style="font-weight: bold;font-size: 14px;">Giới Tính</th>
			<th style="font-weight: bold;font-size: 14px;">Ngày Sinh</th>
			<th style="font-weight: bold;font-size: 14px;">Nơi Sinh</th>
			<th style="font-weight: bold;font-size: 14px;">Ngày Kiểm Tra</th>
			<th style="font-weight: bold;font-size: 14px;">Xếp Loại</th>
			<th style="font-weight: bold;font-size: 14px;">Kết Quả</th>
			<th style="font-weight: bold;font-size: 14px;">Ngày Ký</th>
			<th style="font-weight: bold;font-size: 14px;">Số Hiệu</th>
			<th style="font-weight: bold;font-size: 14px;">Số Vào Sổ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($hocvien as $hocvien)
		<tr>
			<td>{{$hocvien->SBD}}</td>
			<td>{{$hocvien->HoTenHV}}</td>
			<td>{{$hocvien->GioiTinh}}</td>
			<td>{{$hocvien->NgaySinh}}</td>
			<td>{{$hocvien->NoiSinh}}</td>
			<td>{{$hocvien->NgayThi}}</td>
			<td>{{$hocvien->TongKet}}</td>
			<td>{{$hocvien->KetQua}}</td>
			<td>{{$hocvien->NgayKy}}</td>
			<td>{{$hocvien->SoHieu}}</td>
			<td>{{$hocvien->SoVaoSo}}</td>
		</tr>
		@endforeach
	</tbody>
</table>