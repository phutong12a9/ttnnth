<?php

namespace App\Http\Controllers;

use App\chungchi;
use App\lopthi;
use App\hocviendangky;
use App\Imports\XetDuyetImport;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExport;

class VanBangController extends Controller {
	public function getTracuuvanbang() {
		return view('vanbang.tracuuvanbang');
	}

	// public function getDotcapvanbang(){
	// 	$chungchi = chungchi::all();
	//     $vanbang = DB::table('chungchi')->join('dotcap','chungchi.ID','dotcap.ID_ChungChi')->where('TrangThai','Đang Mở')->get();
	//     return view('vanbang.dotcapvanbang',compact('chungchi','vanbang'));
	// }

	public function getThemvanbang(Request $req) {
		$chungchi = chungchi::all();
		$themchungchi = chungchi::all();
		return view('vanbang.themvanbang', compact('chungchi', 'themchungchi'));
	}

	public function postCapnhatvanbang(Request $req) {
		$this->validate($req,
			[
				'ct_ngayky' => 'required|date_format:"Y-m-d"', // bắt buộc
				'ct_sohieu' => 'required', // bắt buộc
				'ct_sovaoso' => 'required', // bắt buộc
			],
			[
				'ct_ngayky.required' => 'Ngày Ký Không Được Bỏ Trống',
				'ct_ngayky.date_format' => 'Ngày Ký Không Đúng Định Dạng',
				'ct_sohieu.required' => 'Số Hiệu Không Được Bỏ Trống.',
				'ct_sovaoso.required' => 'Số Vào Sổ Cấp Không Được Bỏ Trống.',
			]);
		$id = $req->ct_id;
		$xetduyet = new hocviendangky;
		$arr['NgayKy'] = $req->ct_ngayky;
		$arr['SoHieu'] = $req->ct_sohieu;
		$arr['SoVaoSo'] = $req->ct_sovaoso;
		$arr['XetDuyet'] = "Chờ duyệt";
		$arr['ThoiGian'] = date('Y-m-d');
		$xetduyet::where("ID", $id)->update($arr);
		return redirect()->back()->with('themthanhcong', 'Đã nhập thành công.');
	}
	public function getDuyetvanbang() {
		$chungchi = chungchi::all();
		return view('vanbang.duyetvanbang', compact('chungchi'));
	}

	public function postDuyethocvien(Request $req) {
		$id = $req->xd_id;
		$xetduyet = new hocviendangky;
		$arr['XetDuyet'] = "Đã duyệt";
		$arr['ThoiGian'] = date('Y-m-d');
		$xetduyet::where("ID", $id)->update($arr);
		return redirect()->route('duyet-van-bang')->with('xetduyetthanhcong', 'Đã xét duyệt thành công.');

	}

	public function postKhongduyethocvien(Request $req) {
		$id = $req->xd_id;
		$xetduyet = new hocviendangky;
		$arr['XetDuyet'] = "Không duyệt";
		$arr['ThoiGian'] = date('Y-m-d');
		$xetduyet::where("ID", $id)->update($arr);
		return redirect()->route('duyet-van-bang')->with('xetduyetthanhcong', 'Đã xét duyệt thành công.');

	}
	public function getCapphatvanbang() {
		$chungchi = chungchi::all();
		return view('vanbang.capphatvanbang', compact('chungchi'));
	}

	// public function Invanbang($id) {
	// 	$pdf = \App::make('dompdf.wrapper');
	// 	$pdf->loadHTML($this->In_Van_Bang($id));
	// 	return $pdf->stream();
	// }

	public function Invanbang($id) {
		$vanbang = DB::select('SELECT  TenChungChi,hocvien.*,hocviendangky.*,ketquathi.*
								FROM chungchi,danhsachthi,ketquathi,khoahoc,lophoc,lop,hocviendangky,hocvien
								WHERE hocvien.ID = hocviendangky.ID_HocVien
									AND hocviendangky.ID = lop.ID_HocVienDK
								    AND lop.ID_LopHoc = lophoc.ID
								    AND lophoc.ID_KhoaHoc = khoahoc.ID
								    AND khoahoc.ID_ChungChi = chungchi.ID
								    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
								    AND danhsachthi.ID = ketquathi.ID_DanhSachThi
								    AND hocviendangky.ID =  ?',[$id]);
		if($vanbang[0]->TenChungChi=="TOEIC"){
			$html= view('vanbang.capbangtoeic',compact('vanbang'))->render();
            return response([
                'html'=>$html
            ]);
		}
		elseif($vanbang[0]->TenChungChi=="IELTS"){
			$html= view('vanbang.capbangielts',compact('vanbang'))->render();
            return response([
                'html'=>$html
            ]);
		}
		elseif($vanbang[0]->TenChungChi=="Tin học"){
			$html= view('vanbang.capbangtinhoc',compact('vanbang'))->render();
            return response([
                'html'=>$html
            ]);
		}
		
	}
	public function postImport(Request $req) {
		if ($req->hasFile('file')) {

			// validate incoming request
			$this->validate($req, [
				'file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
			]);

			if ($req->file('file')->isValid()) {
				Excel::import(new XetDuyetImport, request()->file('file'));

			}
		}
		return redirect()->back()->with('themthanhcong', 'Đã thêm mới thành công.');
	}
	public function Excelexport(Request $req) {
		$type = $req->type;
		$tenfile = $req->lopthi;
		if ($tenfile == "") {
			$tenfile = "tatcahocvienvanbang.xlsx";
		}
		else{
			$lopthi = lopthi::select('TenLopThi')->where('ID',$req->lopthi)->first();
			$tenfile = str_replace("/","",$lopthi->TenLopThi.'.xlsx');
		}
		return Excel::download(new ExcelExport, $tenfile);

	}
}
