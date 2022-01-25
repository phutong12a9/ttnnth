<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExport implements FromView, ShouldAutoSize, WithEvents, WithTitle {
	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function view(): View{

		$idlt = Request()->lopthi;
		if($idlt==""){
			$hocvien = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,hocviendangky.*,hocviendangky.ID as ID
	                            FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
	                            WHERE   hocviendangky.ID_HocVien = hocvien.ID
	                                AND hocviendangky.ID = danhsachthi.ID_HocVienDK
	                                AND danhsachthi.ID_LopThi = lopthi.ID
	                                AND ketquathi.ID_DanhSachThi = danhsachthi.ID
	                                AND ketquathi.KetQua = "Đạt"
	                            ORDER BY danhsachthi.ID ASC');
		}
		else {
			$hocvien = DB::select('SELECT  hocvien.* , ketquathi.KetQua,ketquathi.TongKet, danhsachthi.ID as SBD,lopthi.NgayThi,hocviendangky.*,hocviendangky.ID as ID
	                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
	                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
	                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
	                                    AND danhsachthi.ID_LopThi = lopthi.ID
	                                    AND ketquathi.ID_DanhSachThi = danhsachthi.ID
	                                    AND ketquathi.KetQua = "Đạt"
	                                    AND lopthi.ID = ?
	                                ORDER BY danhsachthi.ID ASC',[$idlt]);
	}
		return view('export.hocvienexport', [
			'hocvien' => $hocvien,
		]);
	}

	public function title(): string {
		return 'Sheet1';
	}

	public function registerEvents(): array
	{
		$styleArray = [
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					//'color' => ['argb' => 'FFFF0000'],
				],
			],
		];
		return [
			AfterSheet::class => function (AfterSheet $event) use ($styleArray) {

				$cellRange = 'A3:I3'; // All headers
				$event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
			},
		];
	}

}
