<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\khoahoc;

class ThongKeController extends Controller {
	 public function getTenlop($id){
        $lophoc = DB::table('khoahoc')->join('lophoc','lophoc.ID_KhoaHoc','khoahoc.ID')
					->select('lophoc.ID as ID','TenLop')
					->where('khoahoc.ID', $id)
					->get();
                    echo "<option value=''></option>";
        foreach ($lophoc as $lophoc) {
            echo "<option value='{$lophoc->ID}'>{$lophoc->TenLop}</option>";
        }
        
    }
	public function getThongke() {
		// Danh sách năm từ 2010 đến năm hiện tại
		$ListYear = array();
		$NowYear = Carbon::now()->year;
		for ($i = $NowYear; $i >= 2020; $i--) {
			array_push($ListYear, $i);
		}

		// Khởi tạo mảng rỗng
		$Dat = array();
		$KhongDat = array();
		// $hocvien = hocviendangky::whereYear('');
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', $NowYear)->whereMonth('ThoiGian', $i)->where('KetQua', 'Đạt')->count('ID');
			array_push($Dat, $thang[$i]); //Thêm học viên vào mảng
		}
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', $NowYear)->whereMonth('ThoiGian', $i)->where('KetQua', 'Không Đạt')->count('ID');
			array_push($KhongDat, $thang[$i]); //Thêm học viên vào mảng
		}


		// Tính tổng
		$TongDat = array_sum($Dat);
		$TongKhongDat = array_sum($KhongDat);
		$TongThanhTich = $TongDat + $TongKhongDat;

		if ($TongThanhTich == 0 ) {

			$pt_D = 0;
			$pt_KD = 0;
		}
		else{
			// Tính %
			$pt_D = ($TongDat / $TongThanhTich) * 100;
			$pt_KD = ($TongKhongDat / $TongThanhTich) * 100;
		}
		
		//Số lượng học viên
		$HocVien = DB::table('danhsachthi')->join('ketquathi','ketquathi.ID_DanhSachThi','danhsachthi.ID')
											->whereYear('ThoiGian',$NowYear)
											->count('danhsachthi.ID');

		// đếm tổng số khóa học năm hiện tại
		$Khoa = DB::select('SELECT COUNT(khoahoc.ID) as Tong
							FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
							WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
								AND danhsachthi.ID_HocVienDK = hocviendangky.ID
							    AND hocviendangky.ID = lop.ID_HocVienDK
							    AND lop.ID_LopHoc = lophoc.ID
							    AND lophoc.ID_KhoaHoc = khoahoc.ID
							    AND YEAR(ketquathi.ThoiGian) = ?',[$NowYear]);

		// đếm tổng số lớp năm hiện tại
		$Lop = DB::select('SELECT COUNT(lophoc.ID) as Tong
							FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc
							WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
								AND danhsachthi.ID_HocVienDK = hocviendangky.ID
							    AND hocviendangky.ID = lop.ID_HocVienDK
							    AND lop.ID_LopHoc = lophoc.ID
							    AND YEAR(ketquathi.ThoiGian) = ?',[$NowYear]);

		//lấy tên các khóa học để loại theo khóa
		$Khoahoc = DB::select('SELECT DISTINCT khoahoc.ID, khoahoc.TenKhoa as TenKhoa, khoahoc.ID as ID
							FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
							WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
								AND danhsachthi.ID_HocVienDK = hocviendangky.ID
							    AND hocviendangky.ID = lop.ID_HocVienDK
							    AND lop.ID_LopHoc = lophoc.ID
							    AND lophoc.ID_KhoaHoc = khoahoc.ID
							    AND YEAR(ketquathi.ThoiGian) = ?',[$NowYear]);

		return view('thongke.thongke', compact('Dat', 'KhongDat', 'TongThanhTich', 'TongDat', 'TongKhongDat', 'pt_D', 'pt_KD', 'ListYear','HocVien','Khoa','Lop','NowYear','Khoahoc'));
	}
	public function postThongkenam(Request $req){
		//selected nam
		$Nam = $req->nam;
		if($req->radio == 0){

			// Danh sách năm từ 2010 đến năm hiện tại
			$ListYear = array();
			$NowYear = Carbon::now()->year;
			for ($i = $NowYear; $i >= 2020; $i--) {
				array_push($ListYear, $i);
			}

			// Khởi tạo mảng rỗng
			$Dat = array();
			$KhongDat = array();
			// $hocvien = hocviendangky::whereYear('');
			for ($i = 1; $i <= 12; $i++) {
				$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', $req->nam)->whereMonth('ThoiGian', $i)->where('KetQua', 'Đạt')->count('ID');
				array_push($Dat, $thang[$i]); //Thêm học viên vào mảng
			}
			for ($i = 1; $i <= 12; $i++) {
				$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian',  $req->nam)->whereMonth('ThoiGian', $i)->where('KetQua', 'Không Đạt')->count('ID');
				array_push($KhongDat, $thang[$i]); //Thêm học viên vào mảng
			}


			// Tính tổng
			$TongDat = array_sum($Dat);
			$TongKhongDat = array_sum($KhongDat);
			$TongThanhTich = $TongDat + $TongKhongDat;

			if ($TongThanhTich == 0 ) {

				$pt_D = 0;
				$pt_KD = 0;
			}
			else{
				// Tính %
				$pt_D = ($TongDat / $TongThanhTich) * 100;
				$pt_KD = ($TongKhongDat / $TongThanhTich) * 100;
			}
			
			//Số lượng học viên
			$HocVien = DB::table('danhsachthi')->join('ketquathi','ketquathi.ID_DanhSachThi','danhsachthi.ID')
												->whereYear('ThoiGian', $req->nam)
												->count('danhsachthi.ID');
			$Khoa = DB::select('SELECT COUNT(khoahoc.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$req->nam]);
			$Lop = DB::select('SELECT COUNT(lophoc.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$req->nam]);
			//lấy tên các khóa học để loại theo khóa
			$Khoahoc = DB::select('SELECT DISTINCT khoahoc.ID, khoahoc.TenKhoa as TenKhoa, khoahoc.ID as ID
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$NowYear]);

			return view('thongke.thongketheonamthang', compact('Dat', 'KhongDat', 'TongThanhTich', 'TongDat', 'TongKhongDat', 'pt_D', 'pt_KD', 'ListYear','HocVien','Khoa','Lop','Nam','Khoahoc'));
		}
		elseif($req->radio == 1){
			// Danh sách năm từ 2010 đến năm hiện tại
			$ListYear = array();
			$NowYear = Carbon::now()->year;
			for ($i = $NowYear; $i >= 2020; $i--) {
				array_push($ListYear, $i);
			}

			// Khởi tạo mảng rỗng
			$Dat = array();
			$KhongDat = array();
			// $hocvien = hocviendangky::whereYear('');
			for ($i = 1; $i <= 4; $i++) {
				$quy[$i] = DB::select('SELECT COUNT(ID) as ID
										FROM ketquathi
										WHERE ketquathi.KetQua = "Đạt"
											AND YEAR(ketquathi.ThoiGian) = ?
											AND QUARTER(ketquathi.ThoiGian) = ?',[$req->nam,$i]);
				array_push($Dat, $quy[$i][0]->ID); //Thêm học viên vào mảng
			}
			for ($i = 1; $i <= 4; $i++) {
				$quy[$i] = DB::select('SELECT COUNT(ID) as ID 
										FROM ketquathi
										WHERE ketquathi.KetQua = "Không Đạt"
											AND YEAR(ketquathi.ThoiGian) = ?
											AND QUARTER(ketquathi.ThoiGian) = ?',[$req->nam,$i]);
				array_push($KhongDat, $quy[$i][0]->ID); //Thêm học viên vào mảng
			}
			// Tính tổng
			$TongDat = array_sum($Dat);
			$TongKhongDat = array_sum($KhongDat);
			$TongThanhTich = $TongDat + $TongKhongDat;

			if ($TongThanhTich == 0 ) {

				$pt_D = 0;
				$pt_KD = 0;
			}
			else{
				// Tính %
				$pt_D = ($TongDat / $TongThanhTich) * 100;
				$pt_KD = ($TongKhongDat / $TongThanhTich) * 100;
			}
			
			//Số lượng học viên
			$HocVien = DB::table('danhsachthi')->join('ketquathi','ketquathi.ID_DanhSachThi','danhsachthi.ID')
												->whereYear('ThoiGian', $req->nam)
												->count('danhsachthi.ID');
			$Khoa = DB::select('SELECT COUNT(khoahoc.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$req->nam]);
			$Lop = DB::select('SELECT COUNT(lophoc.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$req->nam]);
			//lấy tên các khóa học để loại theo khóa
			$Khoahoc = DB::select('SELECT DISTINCT khoahoc.ID, khoahoc.TenKhoa as TenKhoa, khoahoc.ID as ID
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$NowYear]);

			return view('thongke.thongketheonamquy', compact('Dat', 'KhongDat', 'TongThanhTich', 'TongDat', 'TongKhongDat', 'pt_D', 'pt_KD', 'ListYear','HocVien','Khoa','Lop','Nam','Khoahoc'));
		}
	}
	public function postThongkekhoa(Request $req){
		if($req->has('tenlop')){
			// Danh sách năm từ 2010 đến năm hiện tại
			$ListYear = array();
			$NowYear = Carbon::now()->year;
			for ($i = $NowYear; $i >= 2020; $i--) {
				array_push($ListYear, $i);
			}
			// Tính tổng
			$Dat = DB::select('SELECT COUNT(danhsachthi.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
                                    AND ketquathi.KetQua = "Đạt"
                                    AND lophoc.ID =?', [$req->tenlop]);
			$KhongDat = DB::select('SELECT COUNT(danhsachthi.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
                                    AND ketquathi.KetQua = "Không Đạt"
                                    AND lophoc.ID =?', [$req->tenlop]);
			$TongDat = $Dat[0]->Tong;
			$TongKhongDat = $KhongDat[0]->Tong;
			$TongThanhTich = $TongDat + $TongKhongDat;

			if ($TongThanhTich == 0 ) {

				$pt_D = 0;
				$pt_KD = 0;
			}
			else{
				// Tính %
				$pt_D = ($TongDat / $TongThanhTich) * 100;
				$pt_KD = ($TongKhongDat / $TongThanhTich) * 100;
			}
			
			//Số lượng học viên
			$HocVien = DB::table('danhsachthi')->join('ketquathi','ketquathi.ID_DanhSachThi','danhsachthi.ID')
												->whereYear('ThoiGian', $req->nam)
												->count('danhsachthi.ID');
			$Khoa = DB::select('SELECT COUNT(khoahoc.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$req->nam]);
			$Lop = DB::select('SELECT COUNT(lophoc.ID) as Tong
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$req->nam]);
			//lấy tên các khóa học để loại theo khóa
			$Khoahoc = DB::select('SELECT DISTINCT khoahoc.ID, khoahoc.TenKhoa as TenKhoa, khoahoc.ID as ID
								FROM ketquathi,danhsachthi,hocviendangky,lop,lophoc,khoahoc
								WHERE ketquathi.ID_DanhSachThi =danhsachthi.ID
									AND danhsachthi.ID_HocVienDK = hocviendangky.ID
								    AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND YEAR(ketquathi.ThoiGian) = ?',[$NowYear]);

			return view('thongke.thongketheokhoa', compact('Dat', 'KhongDat', 'TongThanhTich', 'TongDat', 'TongKhongDat', 'pt_D', 'pt_KD', 'ListYear','HocVien','Khoa','Lop','Nam','Khoahoc'));
		}
	}
}
