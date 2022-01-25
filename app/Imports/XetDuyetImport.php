<?php

namespace App\Imports;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Concerns\WithStartRow;
class XetDuyetImport implements ToCollection,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 4;
    }
   public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(($row[8] || $row[9] || $row[10]) == ""){

            }
            else{
            $arr['NgayKy'] = $row[8];
            $arr['SoHieu'] = $row[9];
            $arr['SoVaoSo'] = $row[10];
            $arr['XetDuyet'] = "Chờ duyệt";
           DB::table('hocviendangky')->join('danhsachthi','danhsachthi.ID_HocVienDK','hocviendangky.ID')
                                                ->where('danhsachthi.ID',$row[0])
                                                ->update($arr);
            }
           
        }
    }
}
