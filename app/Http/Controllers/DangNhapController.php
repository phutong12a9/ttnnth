<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Session;

class DangNhapController extends Controller {
	public function postDangnhaphocvien(Request $req) {
		$this->validate($req,
			[
				'taikhoan' => 'required|min:6|max:18',
				'matkhau' => 'required|min:6|max:18',
			],
			[
				'taikhoan.required' => 'Vui lòng nhập tài khoản.',
				'taikhoan.min' => 'Tài Khoản ít nhất 6 ký tự.',
				'taikhoan.max' => 'Tài Khoản tối đa 18 ký tự.',
				'matkhau.min' => 'Mật khẩu ít nhất 6 ký tự.',
				'matkhau.max' => 'Mật khẩu tối đa 18 ký tự.',
				'matkhau.required' => 'Vui lòng nhập mật khẩu.',
			]);
		$thongtin = array('TaiKhoan' => $req->taikhoan, 'password' => $req->matkhau, 'PhanQuyen' => 0);
		if (Auth::attempt($thongtin)) {
			if (Auth::check()) {
				//return redirect()->back()->with('dangnhapthanhcong','Đăng Nhập Thành Công.');
				Session::put('hocvien', Auth::user());
				return redirect()->back()->with('dangnhapthanhcong', 'Đăng Nhập Thành Công.');
				//return view('master');
			} else {
				echo "Khong thanh cong";
			}

		} else {

			return redirect()->back()->with('dangnhapthatbai', 'Đăng Nhập Thất Bại');
		}
		// $TaiKhoan = $req->taikhoan;
		// $MatKhau = $req->matkhau;
		// // mã hóa pasword
		// // $MatKhau = Hash::make($MatKhau);

		// // truy vấn lấy Tài Khoản , Mật Khẩu và Phân Quyền tài khoản
		// $query = DB::table('users')->select('TaiKhoan','MatKhau','PhanQuyen')->where('TaiKhoan',$TaiKhoan)->get();

		// // Đếm Tài khoản có tồn tại hay không
		// $count_users = DB::table('users')->select('TaiKhoan','MatKhau','PhanQuyen')->where('TaiKhoan',$TaiKhoan)->count();

		// if ($count_users == 0) {
		//     echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
		//     exit;
		//     }
		// //Lấy mật khẩu trong database ra

		// $password = DB::table('users')->select('MatKhau')->where('TaiKhoan',$TaiKhoan)->get();
		// echo $password;

		// //So sánh 2 mật khẩu có trùng khớp hay không
		// if ($MatKhau != $password) {
		//     echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
		//     // return redirect()->back()->with('dangnhapthatbai','Đăng Nhập Thất Bại.');
		//     exit;
		// }
		//  else{
		//      $_SESSION['TaiKhoan'] = $TaiKhoan;
		//      echo "Xin chào " . $TaiKhoan . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
		//     die();
		//  }

	}

	public function getDangnhapcanbo() {
		return view('dangnhapcanbo');
	}

	public function postDangnhapcanbo(Request $req) {
		$this->validate($req,
			[
				'taikhoan' => 'required|min:5|max:18',
				'matkhau' => 'required|min:6|max:18',
			],
			[
				'taikhoan.required' => 'Vui lòng nhập tài khoản.',
				'taikhoan.min' => 'Tài Khoản ít nhất 5 ký tự.',
				'taikhoan.max' => 'Tài Khoản tối đa 18 ký tự.',
				'matkhau.min' => 'Mật khẩu ít nhất 6 ký tự.',
				'matkhau.max' => 'Mật khẩu tối đa 18 ký tự.',
				'matkhau.required' => 'Vui lòng nhập mật khẩu.',
			]);
		$thongtin = array('TaiKhoan' => $req->taikhoan, 'password' => $req->matkhau);
		if (Auth::attempt($thongtin)) {
			Session::put('canbo', Auth::user());
			return redirect()->route('quan-tri')->with('dangnhapthanhcong', 'Đăng Nhập Thành Công !');
			// return view('quantri');
		} else {
			return redirect()->back()->with('dangnhapthatbai', 'Đăng Nhập Thất Bại');
		}
	}
	public function getLogout() {
		Session::forget('hocvien');
		return redirect()->route('trang-chu');
	}
	public function getLogoutcanbo() {
		Session::forget('canbo');
		return redirect()->route('dang-nhap-can-bo');
	}
	public function postDoimatkhau(Request $req){
		$this->validate($req,
			[
				'matkhaumoi' => 'required|min:6|max:18',
				'nhaplaimatkhaumoi'=>'required|same:matkhaumoi',
			],
			[
				'matkhaumoi.min' => 'Mật khẩu ít nhất 6 ký tự.',
				'matkhaumoi.max' => 'Mật khẩu tối đa 18 ký tự.',
				'matkhaumoi.required' => 'Vui lòng nhập mật khẩu.',
				'nhaplaimatkhaumoi.required' => 'Mật khẩu mới không được bỏ trống.',
				'nhaplaimatkhaumoi.same'=>'Mật khẩu mới không trùng khớp.'

			]);

		$nguoidung = new User;
		$thongtin = array('TaiKhoan' => session('canbo')->TaiKhoan, 'password' => $req->matkhau);
		if (Auth::attempt($thongtin)) {
			if (Auth::check()) {
				$arr['password'] = bcrypt($req->matkhaumoi);;
				$nguoidung::where('ID',session('canbo')->ID)->update($arr);
				return redirect()->back()->with('doimatkhau', 'Đã đổi thành công mật khẩu');
			} else {
				echo "Khong thanh cong";
			}

		} else {
			return redirect()->back()->with('doimatkhau', 'Mật khẩu cũ không chính xác');
		}

	}
}
