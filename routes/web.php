<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'TrangChuController@getTrangchu'
]);
Route::group(['prefix'=>'trangchu'], function(){
	//Gọi Route tracuuketquathi   domain/trangchu/tracuuketquathi
	Route::get('tracuuketquathi',[
		'as'=>'tra-cuu-ket-qua-thi',
		'uses'=>'TrangChuController@getTracuuketquathi'
	]);
	//Gọi Route gioithieu   domain/trangchu/gioithieu
	Route::get('gioithieu',[
		'as'=>'gioi-thieu',
		'uses'=>'TrangChuController@getGioithieu'
	]);

	Route::get('chitietthongbao/{id}',[
		'as'=>'chi-tiet-thong-bao',
		'uses'=>'TrangChuController@getChitietthongbao'
	]);

	Route::get('chuyenmucthongbao/{id}',[
		'as'=>'chuyen-muc-thong-bao',
		'uses'=>'TrangChuController@getChuyenmucthongbao'
	]);
	Route::get('dangkylophoc',[
		'as'=>'dang-ky-lop-hoc',
		'uses'=>'TrangChuController@getDangkylophoc'
	]);
	Route::post('dangkylophoc',[
		'as'=>'dang-ky-lop-hoc-post',
		'uses'=>'TrangChuController@postDangkylophoc'
	]);
	Route::get('huydangkychungchi/{id}',[
		'as'=>'huy-dang-ky-chung-chi',
		'uses'=>'TrangChuController@getHuydangkychungchi'
	]);
});
Route::group([ 'prefix' => 'vanbang' ] , function(){   
//Gọi Route tracuuvanbang:   domain/vanbang/tracuuvanbang 
	Route::get('tracuuvanbang',[
		'as'=>'tra-cuu-van-bang',
		'uses'=>'VanBangController@getTracuuvanbang'
	]);
	//Gọi Route dotcapvanbang:   domain/vanbang/dotcapvanbang 
	Route::get('dotcapvanbang',[
		'as'=>'dot-cap-van-bang',
		'uses'=>'VanBangController@getDotcapvanbang'
	]);
	Route::post('themdotcap',[
		'as'=>'them-dot-cap',
		'uses'=>'VanBangController@postThemdotcap'
	]);
	Route::post('capnhatdotcap',[
		'as'=>'cap-nhat-dot-cap',
		'uses'=>'VanBangController@postCapnhatdotcap'
	]);
	Route::post('xoadotcap',[
		'as'=>'xoa-dot-cap',
		'uses'=>'VanBangController@postXoadotcap'
	]);
	//Gọi Route themvanbang:   domain/vanbang/themvanbang 
	Route::get('themvanbang',[
		'as'=>'them-van-bang',
		'uses'=>'VanBangController@getThemvanbang'
	]);
	Route::post('themmoivanbang',[
		'as'=>'them-moi-van-bang',
		'uses'=>'VanBangController@postThemvanbang'
	]);
	Route::post('capnhatvanbang',[
		'as'=>'cap-nhat-van-bang',
		'uses'=>'VanBangController@postCapnhatvanbang'
	]);
	Route::post('xoavanbang',[
		'as'=>'xoa-van-bang',
		'uses'=>'VanBangController@postXoavanbang'
	]);
	//Gọi Route duyetvanbang:   domain/vanbang/duyetvanbang 
	Route::get('duyetvanbang',[
		'as'=>'duyet-van-bang',
		'uses'=>'VanBangController@getDuyetvanbang'
	]);
	Route::post('duyethocvien',[
		'as'=>'duyet-hoc-vien',
		'uses'=>'VanBangController@postDuyethocvien'
	]);
	Route::post('khongduyethocvien',[
		'as'=>'khong-duyet-hoc-vien',
		'uses'=>'VanBangController@postKhongduyethocvien'
	]);
	Route::get('capphatvanbang',[
		'as'=>'cap-phat-van-bang',
		'uses'=>'VanBangController@getCapphatvanbang'
	]);
	Route::get('invanbang/{id}',[
		'as'=>'in-van-bang',
		'uses'=>'VanBangController@Invanbang'
	]);
	Route::post('importvanbang',[
		'as'=>'import-van-bang',
		'uses'=>'VanBangController@postImport'
	]);
	Route::post('exportvanbang',[
		'as'=>'export-van-bang',
		'uses'=>'VanBangController@Excelexport'
	]);
}); 
Route::group([ 'prefix' => 'thongbao' ] , function(){   
//Gọi Route dangthongbao:   domain/thongbao/dangthongbao 
	Route::get('dangthongbao',[
		'as'=>'dang-thong-bao',
		'uses'=>'ThongBaoController@getDangthongbao'
	]);
	Route::post('dangthongbaomoi',[
		'as'=>'dang-thong-bao-moi',
		'uses'=>'ThongBaoController@postDangthongbao'
	]);
	Route::get('xoathongbao/{id}',[
		'as'=>'xoa-thong-bao',
		'uses'=>'ThongBaoController@getXoathongbao'
	]);
	//Gọi Route danhsachthongbao:   domain/vanbang/danhsachthongbao 
	Route::get('danhsachthongbao',[
		'as'=>'danh-sach-thong-bao',
		'uses'=>'ThongBaoController@getDanhsachthongbao'
	]);
	//Gọi Route capnhatthongbao:   domain/thongbao/capnhatthongbao
	Route::get('capnhatthongbao/{id}',[
		'as'=>'cap-nhat-thong-bao',
		'uses'=>'ThongBaoController@getCapnhatthongbao'
	]);
	Route::post('capnhatthongbao',[
		'as'=>'cap-nhat-lai-thong-bao',
		'uses'=>'ThongBaoController@postCapnhatthongbao'
	]);
}); 
Route::group([ 'prefix' => 'hocvien' ] , function(){   
//Gọi Route dangthongbao:   domain/hocvien/dangkyhocvien 
	Route::get('dangkyhocvien',[
		'as'=>'dang-ky-hoc-vien',
		'uses'=>'HocVienController@getDangkyhocvien'
	]);
	Route::post('dangkyhocvien',[
		'as'=>'dang-ky-hoc-vien',
		'uses'=>'HocVienController@postDangkyhocvien'
	]);
	Route::get('thoikhoabieu',[
		'as'=>'thoi-khoa-bieu',
		'uses'=>'HocVienController@getThoikhoabieu'
	]);
	Route::get('nhapdiem',[
		'as'=>'nhap-diem',
		'uses'=>'HocVienController@getNhapdiem'
	]);
	Route::post('nhapdiemimport',[
		'as'=>'nhap-diem-import',
		'uses'=>'HocVienController@NhapDiemImport'
	]);
	Route::post('postnhapdiem',[
		'as'=>'post-nhap-diem',
		'uses'=>'HocVienController@postNhapDiem'
	]);
	Route::get('nhapbienlai',[
		'as'=>'nhap-bien-lai',
		'uses'=>'HocVienController@getNhapbienlai'
	]);
	Route::post('themhocvienlophoc',[
		'as'=>'them-hoc-vien-lop-hoc',
		'uses'=>'HocVienController@postThemhocvienlophoc'
	]);
	Route::get('sapxeplopthi',[
		'as'=>'sap-xep-lop-thi',
		'uses'=>'HocVienController@getSapxeplopthi'
	]);
	Route::get('lophoc',[
		'as'=>'lophoc',
		'uses'=>'HocVienController@getLophoc'
	]);
	Route::post('themhocvienlopthi',[
		'as'=>'them-hoc-vien-lop-thi',
		'uses'=>'HocVienController@postThemhocvienlopthi'
	]);
	Route::post('nhapdiemexport',[
		'as'=>'nhap-diem-export',
		'uses'=>'HocVienController@NhapDiemExport'
	]);
	Route::post('nhapbienlaihocphi',[
		'as'=>'nhap-bien-lai-hoc-phi',
		'uses'=>'HocVienController@postNhapbienlaihocphi'
	]);

	Route::get('danhsachthi',[
		'as'=>'danh-sach-thi',
		'uses'=>'HocVienController@getDanhsachthi'
	]);
	Route::get('xoahocvienlopthi/{id}',[
		'as'=>'xoa-hoc-vien-lop-thi',
		'uses'=>'HocVienController@getXoahocvienlopthi'
	]);
	Route::get('xemdiem/{id}',[
		'as'=>'xem-diem',
		'uses'=>'HocVienController@getXemdiem'
	]);
	
}); 
Route::group([ 'prefix' => 'tuyensinh' ] , function(){   
//Gọi Route dangthongbao:   domain/tuyensinh/molopchungchi
	Route::get('khoahoc',[
		'as'=>'khoa-hoc',
		'uses'=>'TuyenSinhController@getKhoahoc'
	]);
	Route::post('mokhoa',[
		'as'=>'mo-khoa',
		'uses'=>'TuyenSinhController@postKhoahoc'
	]);
	Route::post('capnhatkhoahoc',[
		'as'=>'cap-nhat-khoa-hoc',
		'uses'=>'TuyenSinhController@postCapnhatkhoahoc'
	]);
	Route::get('khoa',[
		'as'=>'khoa',
		'uses'=>'TuyenSinhController@getKhoa'
	]);
	Route::get('lophoc',[
		'as'=>'lop-hoc',
		'uses'=>'TuyenSinhController@getLophoc'
	]);
	Route::post('lophoc',[
		'as'=>'lop-hoc-post',
		'uses'=>'TuyenSinhController@postLophoc'
	]);
	Route::post('editlophoc',[
		'as'=>'edit-lop-hoc',
		'uses'=>'TuyenSinhController@postCapnhatlophoc'
	]);
	Route::get('lophocphan',[
		'as'=>'lop-hoc-phan',
		'uses'=>'TuyenSinhController@getLophocphan'
	]);
	Route::post('lophocphan',[
		'as'=>'post-lop-hoc-phan',
		'uses'=>'TuyenSinhController@postLophocphan'
	]);
	Route::get('sapxeplop/{id}',[
		'as'=>'sap-xep-lop',
		'uses'=>'TuyenSinhController@getSapxeplop'
	]);
	Route::post('themdong',[
		'as'=>'them-dong',
		'uses'=>'TuyenSinhController@postThemdong'
	]);
	Route::get('xoadong/{id}',[
		'as'=>'xoa-dong',
		'uses'=>'TuyenSinhController@getXoadong'
	]);
	Route::post('sapxeplop',[
		'as'=>'sap-xep-lop-post',
		'uses'=>'TuyenSinhController@postSapxeplop'
	]);
	Route::get('lopthi',[
		'as'=>'lopthi',
		'uses'=>'TuyenSinhController@getLopthi'
	]);
	Route::post('lopthi',[
		'as'=>'post-lopthi',
		'uses'=>'TuyenSinhController@postLopthi'
	]);
	
}); 
Route::group(['prefix'=>'ajax'], function(){
	//Gọi Route ajax  domain/ajax/ 
	Route::get('banghocvien/{id}',[
		'as'=>'bang-hoc-vien',
		'uses'=>'AjaxController@getBanghocvien'
	]);
	Route::get('banghocvien',[
		'as'=>'bang-hoc-vien-chung-chi',
		'uses'=>'AjaxController@getBanghocvienchungchi'
	]);
	Route::get('chitiethocvien/{id}',[
		'as'=>'chi-tiet-hoc-vien',
		'uses'=>'AjaxController@getChitiethocvien'
	]);
	Route::get('bangxetduyethocvien/{id}',[
		'as'=>'bang-xet-duyet-hoc-vien',
		'uses'=>'AjaxController@getBangxetduyethocvien'
	]);
	Route::get('bangxetduyethocvienchungchi',[
		'as'=>'bang-xet-duyet-hoc-vien-chung-chi',
		'uses'=>'AjaxController@getBangxetduyethocvienchungchi'
	]);
	Route::get('bangxetduyethocvien/{idvb}/{iddc}',[
		'as'=>'bang-xet-duyet-hoc-vien-dot-cap',
		'uses'=>'AjaxController@getBangxetduyethocviendotcap'
	]);
	Route::get('xetduyethocvien/{id}',[
		'as'=>'xet-duyet-hoc-vien',
		'uses'=>'AjaxController@getXetduyethocvien'
	]);
	Route::get('chitietdotthi/{id}',[
		'as'=>'chi-tiet-dot-thi',
		'uses'=>'AjaxController@getChitietdotthi'
	]);
	Route::get('banglophoc/{id}',[
		'as'=>'bang-lop-hoc',
		'uses'=>'AjaxController@getBanglophoc'
	]);
	// Route::get('bangdotcaplophoc/{idcc}/{iddc}',[
	// 	'as'=>'bang-dot-cap-lop-hoc',
	// 	'uses'=>'AjaxController@getBangdotcaplophoc'
	// ]);
	// Route::get('buoihoc/{id}',[
	// 	'as'=>'buoi-hoc',
	// 	'uses'=>'AjaxController@getChitietbuoihoc'
	// ]);
	// Route::post('thembuoihoc',[
	// 	'as'=>'them-buoi-hoc',
	// 	'uses'=>'AjaxController@postThembuoihoc'
	// ]);
	Route::get('bangcapphatvanbang/{id}',[
		'as'=>'bang-cap-phat-van-bang',
		'uses'=>'AjaxController@getBangcapphatvanbang'
	]);
	Route::get('bangcapphatvanbang',[
		'as'=>'bang-cap-phat-van-bang',
		'uses'=>'AjaxController@getBangcapphatvanbangchungchi'
	]);
	Route::get('capphatvanbang/{id}',[
		'as'=>'cap-phat-van-bang-hoc-vien',
		'uses'=>'AjaxController@getCapphatvanbang'
	]);
	Route::get('lophoc/{id}',[
		'as'=>'ajax-lop-hoc',
		'uses'=>'AjaxController@getHocvienlophoc'
	]);
	Route::get('khoahoc/{id}',[
		'as'=>'ajax-khoa-hoc',
		'uses'=>'AjaxController@getHocvienkhoahoc'
	]);
	Route::get('hocviendanhapdiem/{id}',[
		'as'=>'hoc-vien-lop-hoc',
		'uses'=>'AjaxController@bangdanhapdiem'
	]);
	Route::get('hocvienchuanhapdiem/{id}',[
		'as'=>'hoc-vien-chua-nhap-diem',
		'uses'=>'AjaxController@bangchuanhapdiem'
	]);
	Route::get('tenlop/{id}',[
		'as'=>'ten-lop',
		'uses'=>'AjaxController@getTenlop'
	]);
	Route::get('tenkhoa/{id}',[
		'as'=>'ten-khoa',
		'uses'=>'AjaxController@getTenkhoa'
	]);
	Route::get('tenkhoahoc/{id}',[
		'as'=>'ten-khoa-hoc',
		'uses'=>'AjaxController@getTenkhoahoc'
	]);
	Route::get('lop/{id}',[
		'as'=>'ajax-lop',
		'uses'=>'AjaxController@getLop'
	]);
	Route::get('dangkylop/{id}',[
		'as'=>'dang-ky-lop',
		'uses'=>'AjaxController@getDangkylophoc'
	]);

	Route::get('tenlophp/{id}',[
		'as'=>'ten-lop-hp',
		'uses'=>'AjaxController@getTenlophp'
	]);

	Route::get('lophocchinhthuc/{id}',[
		'as'=>'lop-hoc-chinh-thuc',
		'uses'=>'AjaxController@getBanglopchinhthuc'
	]);
	Route::get('tenlopthi/{id}',[
		'as'=>'ten-lop-thi',
		'uses'=>'AjaxController@getTenlopthi'
	]);
	// Route::get('lopthi/{id}',[
	// 	'as'=>'lop-thi',
	// 	'uses'=>'AjaxController@getLopthi'
	// ]);
	Route::get('bienlaihocphi',[
		'as'=>'bien-lai-hoc-phi',
		'uses'=>'AjaxController@getBienlaihocphi'
	]);
	Route::get('chitietbienlai/{id}',[
		'as'=>'chi-tiet-bien-lai',
		'uses'=>'AjaxController@getChitietbienlai'
	]);
	Route::get('bangdanhsachthi/{id}',[
		'as'=>'bang-danh-sach-thi',
		'uses'=>'AjaxController@getBangdanhsachthi'
	]);
	Route::get('modaldanhsachthi/{id}',[
		'as'=>'modal-danh-sach-thi',
		'uses'=>'AjaxController@getModaldanhsachthi'
	]);
	Route::get('sapxeplophoc/{id}',[
		'as'=>'ajax-sap-xep-lop-hoc',
		'uses'=>'AjaxController@getSapxeplophoc'
	]);
	Route::get('sapxeplopthi/{id}',[
		'as'=>'ajax-sap-xep-lop-thi',
		'uses'=>'AjaxController@getSapxeplopthi'
	]);
	Route::get('nhapdiem/{id}',[
		'as'=>'ajax-nhap-diem',
		'uses'=>'AjaxController@getNhapdiem'
	]);
});
Route::group(['prefix'=>'dangnhap'], function(){
	//Gọi Route dangnhap   domain/dangnhap/ 
	Route::get('/',[
		'as'=>'dang-nhap-can-bo',
		'uses'=>'DangNhapController@getDangnhapcanbo'
	]);
	Route::post('dangnhaphocvien',[
		'as'=>'dang-nhap-hoc-vien',
		'uses'=>'DangNhapController@postDangnhaphocvien'
	]);
	Route::post('dangnhapcanbo',[
		'as'=>'dang-nhap-can-bo-post',
		'uses'=>'DangNhapController@postDangnhapcanbo'
	]);
	Route::get('dangxuat',[
		'as'=>'dang-xuat',
		'uses'=>'DangNhapController@getLogout'
	]);
	Route::get('dangxuatcanbo',[
		'as'=>'dang-xuat-can-bo',
		'uses'=>'DangNhapController@getLogoutcanbo'
	]);
	Route::post('doimatkhau',[
		'as'=>'doi-mat-khau',
		'uses'=>'DangNhapController@postDoimatkhau'
	]);
});
Route::group(['prefix'=>'thongke'],function(){

	Route::get('tenlop/{id}',[
		'as'=>'ten-lop-tk',
		'uses'=>'ThongKeController@getTenlop'
	]);
	Route::get('thongke',[
		'as'=>'thong-ke',
		'uses'=>'ThongKeController@getThongke'
	]);
	Route::post('thongketheonam',[
		'as'=>'thong-ke-theo-nam',
		'uses'=>'ThongKeController@postThongkenam'
	]);
	Route::post('thongketheokhoa',[
		'as'=>'thong-ke-theo-khoa',
		'uses'=>'ThongKeController@postThongkekhoa'
	]);
});
Route::group(['prefix'=>'quantri'],function(){

	Route::get('/',[
		'as'=>'quan-tri',
		'uses'=>'QuanTriController@getAdmin'
	]);
	Route::get('giangvien',[
		'as'=>'giang-vien',
		'uses'=>'QuanTriController@getGiangvien'
	]);
	Route::post('postgiangvien',[
		'as'=>'post-giang-vien',
		'uses'=>'QuanTriController@postGiangvien'
	]);
	Route::post('capnhatgiangvien',[
		'as'=>'edit-giang-vien',
		'uses'=>'QuanTriController@postCapnhatgiangvien'
	]);
	Route::get('xoagiangvien/{id}',[
		'as'=>'xoa-giang-vien',
		'uses'=>'QuanTriController@getXoagiangvien'
	]);
	Route::get('danhmuc',[
		'as'=>'danh-muc',
		'uses'=>'QuanTriController@getDanhmuc'
	]);
	Route::post('danhmuc',[
		'as'=>'post-danh-muc',
		'uses'=>'QuanTriController@postDanhmuc'
	]);
	Route::post('capnhatdanhmuc',[
		'as'=>'edit-danh-muc',
		'uses'=>'QuanTriController@postCapnhatdanhmuc'
	]);
	Route::get('xoadanhmuc/{id}',[
		'as'=>'xoa-danh-muc',
		'uses'=>'QuanTriController@getXoadanhmuc'
	]);
	Route::get('chungchi',[
		'as'=>'chung-chi',
		'uses'=>'QuanTriController@getChungchi'
	]);
	Route::post('chungchi',[
		'as'=>'post-chung-chi',
		'uses'=>'QuanTriController@postChungchi'
	]);
	Route::post('capnhatchungchi',[
		'as'=>'edit-chung-chi',
		'uses'=>'QuanTriController@postCapnhatchungchi'
	]);
	Route::get('phong',[
		'as'=>'phong',
		'uses'=>'QuanTriController@getPhong'
	]);
	Route::post('phong',[
		'as'=>'post-phong',
		'uses'=>'QuanTriController@postPhong'
	]);
	Route::post('capnhatphong',[
		'as'=>'edit-phong',
		'uses'=>'QuanTriController@postCapnhatphong'
	]);
	Route::get('xoaphong/{id}',[
		'as'=>'xoa-phong',
		'uses'=>'QuanTriController@getXoaphong'
	]);

	Route::get('nguoidung',[
		'as'=>'nguoi-dung',
		'uses'=>'QuanTriController@getNguoidung'
	]);

	Route::post('nguoidung',[
		'as'=>'post-nguoi-dung',
		'uses'=>'QuanTriController@postNguoidung'
	]);

});
Route::get('api/get_tenlop', function(Request $req){
  $input = $req->input('option');
  $khoahoc = DB::table('khoahoc')->select('TenKhoa')
  				->where('ID', $input)
                  ->first();
  #$courses = DB::table('courses')->lists('level');
  $TenKhoa = $khoahoc->TenKhoa;  
  $K = str_replace("Khóa ", "K",$TenKhoa );
  return response($K);
});

Route::get('api/get_lophoc', function(Request $req){
	$input = $req->input('option');
	$khoahoc = DB::table('khoahoc')->join('lophoc','lophoc.ID_KhoaHoc','khoahoc.ID')
					->select('lophoc.ID as ID','TenLop')
					->where('khoahoc.ID', $input)
					->get();
	#$courses = DB::table('courses')->lists('level');
	dd($khoahoc);     
	return response($khoahoc);
  });


