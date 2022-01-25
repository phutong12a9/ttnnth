<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\chungchi;
use App\dotthi;
use App\buoihoc;
use App\phonghoc;
use App\giangvien;
use App\khoahoc;
use App\lophoc;
use App\lop;
use App\lopthi;
use App\lophocphan;
use App\lophocchinhthuc;
use App\thongbao;
use App\khoa;
use App\hocviendangky;
use App\sapxeplophp;
use DB;
use Excel;
class TuyenSinhController extends Controller
{
    public function getKhoahoc(){
    	$khoahoc = DB::table('khoahoc')->join('khoa','khoa.ID','khoahoc.ID_Khoa')
                                        ->select('khoahoc.*','Ten')
                                        ->orderBy('Ten','DESC')
                                        ->orderBy('TenKhoa','ASC')
                                        ->get();
    	$chungchi = chungchi::all();
        $khoa = khoa::select('*')->orderBy('ID','DESC')->get();
    	return view('tuyensinh.khoahoc',compact('khoahoc','chungchi','khoa'));
    }
    public function postKhoahoc(Request $req){

            $this->validate($req,
            [
                'tenchungchi'       => 'required',
                'ngaykhaigiang'     => 'required|date_format:"Y-m-d"',
                'thoigianthi'       => 'required|date_format:"Y-m-d"',
                'hocphi'            => 'required|numeric'
            ],
            [   
                'tenchungchi.required'          => 'Vui lòng chọn chứng chỉ.',
                'ngaykhaigiang.required'        => 'Vui lòng nhập ngày khai giảng.',
                'ngaykhaigiang.date_format'     => 'Ngày khai giảng không đúng định dạng',
                'thoigianthi.required'          => 'Vui lòng nhập thời gian thi',
                'thoigianthi.date_format'       => 'Thời gian thi không đúng định dạng',
                'hocphi.required'               => 'Vui lòng nhập học phí.',
                'hocphi.numeric'               => 'Học phí phải ở dạng số.'
            ]);

        $tenchungchi = chungchi::select('TenChungChi')->where('ID',$req->tenchungchi)->first();
        $tenkhoa = khoa::select('Ten')->where('ID',$req->khoa)->first();
        $k = str_replace("Khóa ", "K", $tenkhoa["Ten"]);

        $Tenkhoahoc = $tenchungchi->TenChungChi ." ".$req->capdo ." ".$k;
        if(khoahoc::where('TenKhoa',$Tenkhoahoc)->exists()){
           return redirect()->back()->with('error','Tên khóa học đã tồn tại');  
        }
        else{

            $khoahoc = new khoahoc;
            $khoahoc->ID_ChungChi = $req->tenchungchi;
            $khoahoc->ID_Khoa = $req->khoa;
            $khoahoc->TenKhoa = $Tenkhoahoc;
            $khoahoc->NgayKhaiGiang = $req->ngaykhaigiang;
            $khoahoc->ThoiGianThi = $req->thoigianthi;
            $khoahoc->HocPhi = $req->hocphi;
            $khoahoc->TrangThai = "Đang Mở";
            $khoahoc->save();
            return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
        }
            
    }
    public function postCapnhatkhoahoc(Request $req){
        $this->validate($req,
            [
                'e_khaigiang' => 'required|date_format:"d/m/Y"', // bắt buộc
                'e_thi' => 'required|date_format:"d/m/Y"', // bắt buộc
                'e_hocphi' => 'required|numeric', // bắt buộc
            ],
            [
                'e_khaigiang.required'        => 'Vui lòng nhập ngày khai giảng.',
                'e_khaigiang.date_format'     => 'Ngày khai giảng không đúng định dạng',
                'e_thi.required'              => 'Vui lòng nhập thời gian thi',
                'e_thi.date_format'           => 'Thời gian thi không đúng định dạng',
                'e_hocphi.required'           => 'Vui lòng nhập học phí.',
                'e_hocphi.numeric'            => 'Học phí phải ở dạng số.'
            ]);
        $khoahoc = new khoahoc;
        $arr['NgayKhaiGiang'] = Carbon::createFromFormat('d/m/Y', $req->e_khaigiang)->format('Y-m-d');
        $arr['ThoiGianThi'] = Carbon::createFromFormat('d/m/Y', $req->e_thi)->format('Y-m-d');
        $arr['HocPhi'] = $req->e_hocphi;
        $arr['TrangThai'] = $req->e_trangthai;
        $khoahoc::where('ID',$req->e_id)->update($arr);
        return redirect()->back()->with('capnhatthanhcong', 'Đã cập nhật thành công');
    }

    public function getLophoc(){
        $khoa = khoa::select('*')->orderBy('Ten','DESC')->get();
        $khoahoc = khoahoc::all();
        $kh = khoahoc::all();
        $lophoc = lophoc::all();
        return view('tuyensinh.lophoc',compact('khoa','khoahoc','kh','lophoc'));
    }
    public function postLophoc(Request $req){

            
            $lophoc                 = new lophoc;
            $lophoc->ID_KhoaHoc     = $req->tenkhoahoc;
            $lophoc->TenLop         = $req->tenlop;
            $lophoc->NgayHoc        = $req->ngayhoc;
            $lophoc->BuoiHoc        = $req->buoihoc;
            $lophoc->ThoiGianHoc    = $req->thoigianhoc;
            $lophoc->save();
        return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
    }
     public function postCapnhatlophoc(Request $req){

            $lophoc                 = new lophoc;
            $arr['ThoiGianHoc']    = $req->e_thoigianhoc;
            $lophoc::where('ID',$req->e_id)->update($arr);
        return redirect()->back()->with('themthanhcong','Đã cập nhật thành công.');
    }

    public function getLophocphan(){
        $khoa = khoa::select('*')->orderBy('Ten','DESC')->get();
        $khoahoc = khoahoc::all();
        $giangvien = giangvien::all();
        $phonghoc = phonghoc::all();
        $lophocphan = DB::table('lophocphan')->join('giangvien','giangvien.ID','lophocphan.ID_GiangVien')
                                                ->select('lophocphan.ID as ID','TenLop','HoTenGV')
                                                ->get();

        return view('tuyensinh.lophocphan',compact('khoa','khoahoc','giangvien','phonghoc','lophocphan'));
    }

     public function postLophocphan(Request $req){

            
            $lophocphan                 = new lophocphan;
            $lophocphan->ID_LopHoc      = $req->tenlop;
            $lophocphan->TenLop         = $req->tenlophp;
            $lophocphan->ID_GiangVien   = $req->giangvien;
            $lophocphan->save();
            $sapxeplop                  = new sapxeplophp;
            $sapxeplop->ID_LopHP = $lophocphan->id;
            $sapxeplop->Buoi = "1";
            $sapxeplop->save(); 
        return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
    }

    public function getSapxeplop($id){
        $lhp = DB::table('lophocphan')->join('sapxeplophp','lophocphan.ID','sapxeplophp.ID_LopHP')
                                        ->where('lophocphan.ID',$id)
                                        ->orderBy('Buoi')
                                        ->get();
        $phonghoc = phonghoc::all();
        $giangvien = giangvien::all();
        $ID_LHP = $id;
        

        return view('tuyensinh.sapxeplop',compact('lhp','phonghoc','giangvien','ID_LHP'));
    }
    public function postThemdong(Request $req){
        $dong = $req->Themdong;
        $IDLHP = $req->IDLHP;
        for ($i=1; $i <=$dong ; $i++) { 

             for ($j=1; $j <=100; $j++) { 
                if(sapxeplophp::where('ID_LopHP',$IDLHP)->where('Buoi',$j)->exists()){
                }
                else{
                   $sapxeplop = new sapxeplophp;
                    $sapxeplop->ID_LopHP = $IDLHP;
                    $sapxeplop->Buoi = $j;
                    $sapxeplop->save();
                    break; 
                     
                }
             }
        }
        return redirect()->back()->with('themthanhcong','Thêm thành công');
    }
    public function getXoadong($id){
        sapxeplophp::where('ID', $id)->delete();
         return redirect()->back();
    }

    public function postSapxeplop(Request $req){
        $length = count($req->lhp);
        for($i=0; $i<$length; $i++){
           
            $sapxeplop = new sapxeplophp;
            $arr['ID_Phong'] = $req->p[$i];
            $arr['ID_GiangVien'] = $req->gv[$i];
            $arr['ID_TroGiang'] = $req->tg[$i];
            $sapxeplop::where('ID', $req->lhp[$i])->update($arr);

        }
        return redirect()->back()->with('capnhatthanhcong', 'Đã cập nhật thành công');
    }
    public function getKhoa(){
        $count = Khoa::count('ID');

        $TenKhoa = "Khóa"." ".($count+1);
        $khoa = new khoa;
        $khoa->Ten =$TenKhoa;
        $khoa->ThoiGian = date('Y-m-d');
        $khoa->save();
       
        return redirect()->back()->with('themthanhcong', 'Đã thêm'." ".$TenKhoa);
    }
    public function getLopthi(){
        $giangvien = giangvien::all();
        $phong = phonghoc::all();
        $chungchi = chungchi::all();
        $lopthi = DB::select('SELECT chungchi.TenChungChi, giangvien.HoTenGV,phonghoc.TenPhong, lopthi.*
                                FROM chungchi,phonghoc,giangvien,lopthi
                                WHERE chungchi.ID = lopthi.ID_ChungChi
                                    AND phonghoc.ID = lopthi.ID_Phong
                                    AND giangvien.ID = lopthi.ID_GiangVien');
        return view('tuyensinh.lopthi',compact('giangvien','phong','chungchi','lopthi'));
    }
    public function postLopthi(Request $req){
        $lopthi = new lopthi;
        $lopthi->ID_ChungChi = $req->chungchi;
        $lopthi->ID_Phong = $req->phong;
        $lopthi->ID_GiangVien = $req->giangvien;
        $lopthi->TenLopThi = $req->tenlopthi;
        $lopthi->NguongDat = $req->nguongdat;
        $lopthi->NgayThi = $req->ngaythi;
        $lopthi->Buoithi = $req->buoithi;
        $lopthi->GioThi = $req->giothi;
        $lopthi->ThoiGianLam = $req->thoigianlam;
        if($req->hasFile('noidungthi')){
            $file = $req->noidungthi;
            $file->move(public_path('/source/dethi'),$file->getClientOriginalName());
        $lopthi->NoiDungThi = $file->getClientOriginalName();
        }    
        $lopthi->save();
        return redirect()->back()->with('themthanhcong', 'Đã thêm thành công');
    }

}
