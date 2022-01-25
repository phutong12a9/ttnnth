<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chungchi;
use App\khoahoc;
use DB;
use Carbon\Carbon;
use App\lophoc;
use App\lop;
use App\hocviendangky;
use App\lopthi;
use App\khoa;
class AjaxController extends Controller
{
    public function getTenKhoahoc($id){
    	$khoahoc = DB::table('khoa')->join('khoahoc','khoahoc.ID_Khoa','khoa.ID')
                    ->select('khoahoc.ID as ID','TenKhoa')
                    ->where('khoa.ID', $id)
                    ->get();
    	echo "<option value=''>--Chọn khóa học--</option>";
    	foreach ($khoahoc as $khoahoc) {
    		echo "<option value='{$khoahoc->ID}'>{$khoahoc->TenKhoa}</option>";
    	}
    }

    public function getBanghocvien($id){
    	$xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
                                    AND ketquathi.KetQua = "Đạt"
                                    AND lopthi.ID = ?
                                ORDER BY danhsachthi.ID ASC',[$id]);
    	return view('ajax.banghocvien',compact('xetduyet'));
    }

    public function getBanghocvienchungchi(){
       $xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
                                    AND ketquathi.KetQua = "Đạt"
                                ORDER BY danhsachthi.ID ASC');
        return view('ajax.banghocvien',compact('xetduyet'));
    }

    public function getChitiethocvien(Request $req,$id){
        
            $chitiethocvien = DB::select('SELECT hocviendangky.*, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh, hocvien.NoiSinh, lopthi.NgayThi as NgayThi, ketquathi.KetQua as KetQua,lophoc.TenLop
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $chungchi = chungchi::all();
            $idhocvien = hocviendangky::where("ID",$id)->get();
            $kiemtraduyet = hocviendangky::where("ID",$id)->first();
            $html= view('ajax.modalchitiethocvien',compact('chitiethocvien','chungchi','idhocvien','kiemtraduyet'))->render();            
            return response([
                'html'=>$html
            ]);        
        
        
    }

    public function getBangxetduyethocvien($id){
        $xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
                                    AND ketquathi.KetQua = "Đạt"
                                    AND lopthi.ID = ?
                                ORDER BY danhsachthi.ID ASC',[$id]);
        return view('ajax.bangxetduyethocvien',compact('xetduyet'));
    }

    public function getBangxetduyethocvienchungchi(){
       $xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
                                    AND ketquathi.KetQua = "Đạt"
                                ORDER BY danhsachthi.ID ASC');
        return view('ajax.bangxetduyethocvien',compact('xetduyet'));
    }

     public function getXetduyethocvien(Request $req,$id){
        if ($req->ajax()) {
            $chitiethocvien = DB::select('SELECT hocviendangky.*, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh, hocvien.NoiSinh, lopthi.NgayThi as NgayThi, ketquathi.KetQua as KetQua,lophoc.TenLop
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $kiemtraduyet = hocviendangky::where("ID",$id)->get();
            $hocvien = DB::select('SELECT hocviendangky.ID as ID
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $html= view('ajax.modalxetduyethocvien',compact('chitiethocvien','kiemtraduyet','hocvien'))->render();
            // dd($html);
            return response([
                'html'=>$html
            ]);        
        }
        
    }

     public function getBangcapphatvanbang($id){
        $xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
                                    AND ketquathi.KetQua = "Đạt"
                                    AND hocviendangky.XetDuyet = "Đã Duyệt"
                                    AND lopthi.ID = ?
                                ORDER BY danhsachthi.ID ASC',[$id]);
        return view('ajax.bangcapphatvanbang',compact('xetduyet'));
    }
    public function getBangcapphatvanbangchungchi(){
        $xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
                                    AND ketquathi.KetQua = "Đạt"
                                    AND hocviendangky.XetDuyet = "Đã Duyệt"
                                ORDER BY danhsachthi.ID ASC');
        return view('ajax.bangcapphatvanbang',compact('xetduyet'));
    }
   
    public function getCapphatvanbang(Request $req,$id){
       if ($req->ajax()) {
           $chitiethocvien = DB::select('SELECT hocviendangky.*, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh, hocvien.NoiSinh, lopthi.NgayThi as NgayThi, ketquathi.KetQua as KetQua,lophoc.TenLop
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $kiemtraduyet = hocviendangky::where("ID",$id)->get();
           $hocvien = DB::select('SELECT hocviendangky.ID as ID
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $html= view('ajax.modalcapphatvanbang',compact('chitiethocvien','kiemtraduyet','hocvien'))->render();
            return response([
                'html'=>$html
            ]);        
        }
        
    }
    public function getHocvienlophoc($id){

        $lophoc = DB::select('SELECT HoTenHV,GioiTinh,NgaySinh,NoiSinh,SDT,TenLop,hocviendangky.ID as ID, hocviendangky.TrangThai as TrangThai
                                    FROM hocvien,hocviendangky,lop,lophoc
                                    WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID = lop.ID_HocVienDK
                                        AND lop.ID_LopHoc = lophoc.ID
                                        AND lophoc.ID =?
                                    ORDER BY TrangThai DESC',[$id]);
        return view('ajax.banghocvienlophoc',compact('lophoc'));
    }

    public function getHocvienkhoahoc($id){
         $khoahoc = DB::select("SELECT hocvien.*, hocviendangky.TrangThai as TrangThai, hocviendangky.ID as ID,TenLop
                                FROM hocvien,hocviendangky,khoahoc,lop,lophoc
                                WHERE 	hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID_LopHoc = lophoc.ID
                                    AND lophoc.ID_KhoaHoc = khoahoc.ID
                                    AND hocviendangky.TrangThai IN ('Đã Sắp Lớp','Đã Sắp Lớp Thi')
                                    AND khoahoc.ID=?
                                ORDER BY hocvien.HoTenHV",[$id]);
        return view('ajax.banghocvienkhoahoc',compact('khoahoc'));
    }
    public function bangdanhapdiem($id){
         $loailophoc = DB::select('SELECT  TenChungChi
                                    FROM lopthi,chungchi
                                    WHERE lopthi.ID_ChungChi = chungchi.ID
                                        AND lopthi.ID = ?',[$id]);
         $hocvien = DB::select("SELECT hocvien.*,ketquathi.*,danhsachthi.ID as ID 
                                FROM hocvien,hocviendangky,danhsachthi,lopthi,ketquathi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                    AND danhsachthi.TrangThai = 'Đã Nhập Điểm'
                                    AND lopthi.ID =? ",[$id]);
        $chungchi = chungchi::all();
        return view('ajax.bangdanhapdiem',compact('hocvien','loailophoc','chungchi'));
    }
     public function bangchuanhapdiem($id){
        
        $loailophoc = DB::select('SELECT  TenChungChi
                                    FROM lopthi,chungchi
                                    WHERE lopthi.ID_ChungChi = chungchi.ID
                                        AND lopthi.ID = ?',[$id]);
        $hocvien = DB::select("SELECT hocvien.*,danhsachthi.ID as ID
                                FROM hocvien,hocviendangky,danhsachthi,lopthi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.TrangThai = 'Chưa Nhập Điểm'
                                    AND lopthi.ID =? ",[$id]); 
        $chungchi = chungchi::all();
        return view('ajax.bangchuanhapdiem',compact('hocvien','loailophoc','chungchi'));
    }
    public function getTenlop($id){
        $lophoc = DB::table('khoahoc')->join('lophoc','lophoc.ID_KhoaHoc','khoahoc.ID')
					->select('lophoc.ID as ID','TenLop')
					->where('khoahoc.ID', $id)
					->get();
                    echo "<option value=''>-- Chọn lớp học --</option>";
        foreach ($lophoc as $lophoc) {
            echo "<option value='{$lophoc->ID}'>{$lophoc->TenLop}</option>";
        }
        
    }
    public function getTenkhoa($id){
        $khoahoc = DB::table('khoahoc')->join('chungchi','chungchi.ID','khoahoc.ID_ChungChi')
					->select('khoahoc.ID as ID','TenKhoa')
					->where('chungchi.ID', $id)
                    ->where('khoahoc.TrangThai','Đang Mỏ')
					->get();
                    echo "<option value=''>-- Chọn khóa học --</option>";
        foreach ($khoahoc as $khoahoc) {
            echo "<option value='{$khoahoc->ID}'>{$khoahoc->TenKhoa}</option>";
        }
        
    }
     public function getTenlophp($id){
        $lophocphan = DB::table('lophocphan')->join('lophoc','lophoc.ID','lophocphan.ID_LopHoc')
                    ->select('lophocphan.ID as ID','lophocphan.TenLop as TenLop')
                    ->where('lophoc.ID', $id)
                    ->get();
                    echo "<option value=''>-- Chọn lớp học phần --</option>";
        foreach ($lophocphan as $lophoc) {
            echo "<option value='{$lophoc->ID}'>{$lophoc->TenLop}</option>";
        }
        
    }

    public function getTenlopthi($id){
        $lopthi = DB::table('lopthi')->join('chungchi','chungchi.ID','lopthi.ID_ChungChi')
                    ->select('lopthi.ID as ID','lopthi.TenLopThi as TenLopThi')
                    ->where('chungchi.ID', $id)
                    ->get();
                    echo "<option value=''>-- Chọn lớp thi --</option>";
        foreach ($lopthi as $lt) {
            echo "<option value='{$lt->ID}'>{$lt->TenLopThi}</option>";
        }
        
    }
    public function getDangkylophoc(Request $req , $id){
        if ($req->ajax()) {
        $lophoc = DB::table('lophoc')->join('khoahoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                        ->select('lophoc.ID as ID','TenKhoa','TenLop')
                                        ->where('lophoc.ID',$id)->get();
        $html= view('ajax.modaldangkylophoc',compact('lophoc'))->render();
        return response([
            'html'=>$html
        ]);        
        }

    }

    public function getBanglophoc($id){
        $lophoc = DB::table('lophoc')->join('khoahoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                        ->where('khoahoc.ID',$id)->get();
        return view('ajax.banglophoc',compact('lophoc'));
    }
    public function getBanglopchinhthuc($id){
        $lophoc = DB::select("SELECT hocvien.*
                                FROM hocvien, hocviendangky, lophocphan, lophocchinhthuc
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lophocchinhthuc.ID_HocVienDK
                                    AND lophocchinhthuc.ID_LopHP = lophocphan.ID
                                    AND lophocphan.ID =? ",[$id]); 
        return view('ajax.banglopchinhthuc',compact('lophoc'));
    }
     public function getChitietbienlai($id){
        $chitietbienlai = DB::select('SELECT bienlaihocphi.ID as ID, bienlaihocphi.NgayLap,bienlaihocphi.SoTien,khoahoc.NgayKhaiGiang, hocvien.HoTenHV,lophoc.TenLop,khoahoc.TenKhoa,canbo.HoTenCB
                                    FROM hocvien,hocviendangky,bienlaihocphi,canbo,lop,lophoc,khoahoc
                                    WHERE hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID = bienlaihocphi.ID_HocVienDK
                                        AND bienlaihocphi.ID_CanBo = canbo.ID
                                        AND lop.ID_HocVienDK = hocviendangky.ID
                                        AND lop.ID_LopHoc = lophoc.ID
                                        AND lophoc.ID_KhoaHoc = khoahoc.ID
                                        AND hocviendangky.ID = ?
            ',[$id]);
        $html= view('ajax.bienlaihocphi',compact('chitietbienlai'))->render();
        return response([
            'html'=>$html
        ]);     
    }

    public function getBangdanhsachthi($id){
        $danhsachthi = DB::select('SELECT danhsachthi.ID as SBD, hocvien.*
                                    FROM danhsachthi,hocviendangky,hocvien
                                    WHERE danhsachthi.ID_HocVienDK = hocviendangky.ID
                                        AND hocviendangky.ID_HocVien = hocvien.ID
                                        AND danhsachthi.ID_LopThi = ?
                                        ORDER BY danhsachthi.ID',[$id]);
        return view('ajax.bangdanhsachthi',compact('danhsachthi'));
    }
    public function getModaldanhsachthi(Request $req,$id){
        if ($req->ajax()) {
        $danhsachthi = DB::select('SELECT danhsachthi.ID as SBD, hocvien.*
                                    FROM danhsachthi,hocviendangky,hocvien
                                    WHERE danhsachthi.ID_HocVienDK = hocviendangky.ID
                                        AND hocviendangky.ID_HocVien = hocvien.ID
                                        AND danhsachthi.ID_LopThi = ?
                                        ORDER BY danhsachthi.ID',[$id]);
        $html= view('ajax.modaldanhsachthi',compact('danhsachthi'))->render();;
        return response([
            'html'=>$html
        ]);
        }
    }

    public function getSapxeplophoc($id){
        $khoa = khoa::all();
        $lophoc = DB::select('SELECT HoTenHV,GioiTinh,NgaySinh,NoiSinh,SDT,TenLop,hocviendangky.ID as ID, hocviendangky.TrangThai as TrangThai
                                    FROM hocvien,hocviendangky,lop,lophoc
                                    WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID = lop.ID_HocVienDK
                                        AND lop.ID_LopHoc = lophoc.ID
                                        AND lophoc.ID = ?
                                    ORDER BY hocviendangky.TrangThai DESC',[$id]);
         $lophocphan = DB::table('lophocphan')->join('lophoc','lophoc.ID','lophocphan.ID_LopHoc')
                    ->select('lophocphan.ID as ID','lophocphan.TenLop as TenLop')
                    ->where('lophoc.ID', $id)
                    ->get();
        $check_lophoc = lophoc::select('ID','TenLop')->where('ID',$id)->first();
        $check_khoa = DB::table('khoahoc')->join('khoa','khoa.ID','khoahoc.ID_Khoa')
                                            ->join('lophoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                            ->select('khoa.ID')
                                            ->where('lophoc.ID',$id)
                                            ->first();
        $check_khoahoc = DB::table('khoahoc')->join('lophoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                            ->select('khoahoc.ID','khoahoc.TenKhoa')
                                            ->where('lophoc.ID',$id)
                                            ->first();
        return view('ajax.sapxeplophoc', compact('khoa','lophoc','lophocphan','check_lophoc','check_khoa','check_khoahoc'));
    }
    public function getSapxeplopthi($id){
        $khoa = khoa::all();
        $khoahoc = DB::select("SELECT hocvien.*, hocviendangky.TrangThai as TrangThai, hocviendangky.ID as ID,TenLop
                                FROM hocvien,hocviendangky,khoahoc,lop,lophoc
                                WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID_LopHoc = lophoc.ID
                                    AND lophoc.ID_KhoaHoc = khoahoc.ID
                                    AND hocviendangky.TrangThai IN ('Đã Sắp Lớp','Đã Sắp Lớp Thi')
                                    AND khoahoc.ID=?
                                ORDER BY hocvien.HoTenHV",[$id]);
        $lopthi = DB::table('chungchi')->join('khoahoc','chungchi.ID','khoahoc.ID_ChungChi')
                    ->join('lopthi','chungchi.ID','lopthi.ID_ChungChi')
                    ->select('lopthi.ID as ID','lopthi.TenLopThi as TenLopThi')
                    ->where('khoahoc.ID', $id)
                    ->get();
        $check_khoa = DB::table('khoa')->join('khoahoc','khoahoc.ID_Khoa','khoa.ID')
                                        ->select('khoa.ID','khoa.Ten')
                                        ->where('khoahoc.ID',$id)->first();
        $check_khoahoc = khoahoc::select('ID','TenKhoa')->where('ID',$id)->first();
        return view('ajax.sapxeplopthi', compact('khoa','khoahoc','lopthi','check_khoa','check_khoahoc'));
    }

    public function getNhapdiem($id){
        $loailophoc = DB::select('SELECT  TenChungChi
                                    FROM lopthi,chungchi
                                    WHERE lopthi.ID_ChungChi = chungchi.ID
                                        AND lopthi.ID = ?',[$id]);
        $hocvien = DB::select("SELECT hocvien.*,danhsachthi.ID as ID
                                FROM hocvien,hocviendangky,danhsachthi,lopthi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.TrangThai = 'Chưa Nhập Điểm'
                                    AND lopthi.ID =? ",[$id]); 
        $chungchi = chungchi::all();
        $lopthi = lopthi::where('ID',$id)->get();
        $loaichungchi = DB::table('lopthi')->join('chungchi','chungchi.ID','lopthi.ID_ChungChi')
                                            ->select('chungchi.ID','chungchi.TenChungChi')
                                            ->where('lopthi.ID',$id)
                                            ->first();
        return view('ajax.nhapdiem',compact('loailophoc','hocvien','chungchi','lopthi','loaichungchi'));
    }


}
