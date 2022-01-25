<?php

namespace App\Imports;

use App\ketquathi;
use App\danhsachthi;
use App\lopthi;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class NhapDiemImport implements ToCollection, WithStartRow {
	/**
	 * @param array $row
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function __construct($errors = []) {
		$this->errors = $errors;
	}
	public function startRow(): int {
		return 4;
	}
	public function collection(Collection $rows) {
		// $validator = Validator::make($rows, [
		// 	'0' => [
		// 		'unique:ketquathi,ID_DanhSachThi',

		// 	],
		// ]);
		// if ($validator->fails()) {
		// 	return null;
		// }
		$chungchi = Request()->tenchungchi;
		$TrangThai = new danhsachthi;
		$arr['TrangThai']       = 'Đã Nhập Điểm';
		if ($chungchi == "TOEIC") {
			foreach($rows as $row){
				$nguongdat = DB::table('lopthi')->join('danhsachthi','danhsachthi.ID_LopThi','lopthi.ID')->select('NguongDat')->where('danhsachthi.ID',$row[0])->first();
				$ketquathi = new ketquathi;
				$ketquathi->ID_DanhSachThi = $row[0];
				$ketquathi->DiemNghe = $row[5];
				$ketquathi->DiemDoc = $row[6];
				$ketquathi->TongKet = $row[5]+$row[6];
				if ($row[5]+$row[6] == $nguongdat->NguongDat) {
					$ketquathi->KetQua = "Đạt";
				}
				else{
					$ketquathi->KetQua = "Không Đạt";
				}
				$ketquathi->GhiChu = $row[8];
				$ketquathi->ThoiGian = date('Y-m-d');
				$TrangThai::where('ID', $row[0])->update($arr);
				$ketquathi->save();
			}
		}
		elseif($chungchi == "IELTS")
		{
			foreach($rows as $row){
				$nguongdat = DB::table('lopthi')->join('danhsachthi','danhsachthi.ID_LopThi','lopthi.ID')->select('NguongDat')->where('danhsachthi.ID',$row[0])->first();
				$ketquathi = new ketquathi;
				$ketquathi->ID_DanhSachThi = $row[0];
				$ketquathi->DiemNghe = $row[5];
				$ketquathi->DiemNoi = $row[6];
				$ketquathi->DiemDoc = $row[7];
				$ketquathi->DiemViet= $row[8];
				$ketquathi->TongKet = ($row[5]+$row[6]+$row[7]+$row[8])/4;
				$TongKet = ($row[5]+$row[6]+$row[7]+$row[8])/4;
				if ($TongKet == $nguongdat->NguongDat) {
					$ketquathi->KetQua = "Đạt";
				}
				else{
					$ketquathi->KetQua = "Không Đạt";
				}
				$ketquathi->GhiChu = $row[10];
				$ketquathi->ThoiGian = date('Y-m-d');
				$TrangThai::where('ID', $row[0])->update($arr);
				$ketquathi->save();
			}
		}
		elseif($chungchi== "Tin học"){
			foreach($rows as $row){
				$nguongdat = DB::table('lopthi')->join('danhsachthi','danhsachthi.ID_LopThi','lopthi.ID')->select('NguongDat')->where('danhsachthi.ID',$row[0])->first();
				$ketquathi = new ketquathi;
				$ketquathi->ID_DanhSachThi = $row[0];
				$ketquathi->DiemLyThuyet = $row[5];
				$ketquathi->DiemThucHanh = $row[6];
				$ketquathi->TongKet = $row[5]+$row[6];
				if ($row[5]+$row[6] == $nguongdat->NguongDat) {
					$ketquathi->KetQua = "Đạt";
				}
				else{
					$ketquathi->KetQua = "Không Đạt";
				}
				$ketquathi->GhiChu = $row[8];
				$ketquathi->ThoiGian = date('Y-m-d');
				$TrangThai::where('ID', $row[0])->update($arr);
				$ketquathi->save();
			}
		}
	}
}
