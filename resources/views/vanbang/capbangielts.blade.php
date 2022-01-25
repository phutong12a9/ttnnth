<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test</title>
        <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="border: 1px solid; width: 19cm;height: 13cm; ">
        <div class="row" style="padding:25px 10px">
            <div class="col-lg-12" style="overflow:hidden;">
                <div class="pull-left"><img src="source/img/Logo.png" width="90" height="90"></div>
                <center>
                    <h4>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h4>
                    <h5>Độc lập - Tự do - Hạnh phúc</h5>
                    <hr style="width: 40%;">
                    <h4>CHỨNG CHỈ</h4>
                    <h4>IELTS</h4>
                </center>
            </div>
            <div class="col-lg-12">
                <div>
                    <h5>
                        {{-- <p>Cấp cho: .........................................................................................................................................................</p> --}}
                        <p>Cấp cho: <b>{{$vanbang[0]->HoTenHV}}</b></p>
                        {{-- <p>Sinh ngày:......................................................................Nơi sinh:...................................................................</p> --}}
                        <p>Sinh ngày:&ensp;&ensp;&ensp;&ensp;&ensp; <b>{{date('d/m/Y', strtotime($vanbang[0]->NgaySinh))}}</b>&ensp;&ensp;&ensp; &ensp;Nơi Sinh: &ensp;&ensp;&ensp;&ensp;&ensp;<b>{{$vanbang[0]->NoiSinh}}</b></p>
                        <p>Đạt yêu cầu bài thi ứng dụng tin học cơ băn tại Hội đòng thi: <b>Trung tâm Ngoại ngữ - Tin học Trường Đại học Kỹ thuật - Công nghệ Cần Thơ</b></p>
                        <p>Kết quả: Điểm nghe:&ensp;&ensp;<b>{{$vanbang[0]->DiemNghe}}</b>&ensp;&ensp;&ensp;Điểm nói:&ensp;&ensp;<b>{{$vanbang[0]->DiemNoi}}</b>&ensp;&ensp;&ensp;Điểm đọc:&ensp;&ensp;<b>{{$vanbang[0]->DiemDoc}}</b>&ensp;&ensp;&ensp;Điểm viết:&ensp;&ensp;<b>{{$vanbang[0]->DiemViet}}</b>&ensp;&ensp;&ensp;Tổng kết: &ensp;&ensp;<b>{{$vanbang[0]->TongKet}}</b></p>
                    </h5>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6" style="float:left">
                    
                </div>
                <div class="col-lg-6" style="float:right;">
                    <center>
                         <h5><b>Cần Thơ,</b> ngày <b>{{date('d', strtotime($vanbang[0]->NgayKy))}}</b> tháng <b>{{date('m', strtotime($vanbang[0]->NgayKy))}}</b> năm <b>{{date('Y', strtotime($vanbang[0]->NgayKy))}}</b></h5>
                         <h4><b>HIỆU TRƯỞNG</b></h4>
                    </center>
                </div>
            </div>
            <div class="col-lg-12" style="padding-top: 90px;">
                <h5>
                    <p>Số hiệu: <b>{{$vanbang[0]->SoHieu}}</b></p>
                    <p>Số vào sổ cấp chứng chỉ: <b style="color: red;">{{$vanbang[0]->SoVaoSo}}</b></p>
                </h5>
            </div>
        </div>
        
    </div>
</body>
</html>