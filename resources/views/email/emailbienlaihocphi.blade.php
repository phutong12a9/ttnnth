{{-- This is used to send email to student also  --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> <!-- CSS Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- CDn Jquery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <!-- CDN Boostrap -->
<div style="width:623px; margin:0 auto; border: cadetblue solid thin">
    <div style="width:623px; margin:0 auto;">
        <a href="{{route('trang-chu')}}"><img height="100" width="623" src="https://trungtamnnth.ctuet.edu.vn/wp-content/uploads/2020/09/cropped-b3be343290f56fab36e4.jpg" alt="Trung tâm ngoại ngữ tin học CTUT"/></a>
    </div>


    <div style="margin: 30px">
        <h2 style="text-align: center; font-family: Arial">TRUNG TÂM NGOẠI NGỮ TIN HỌC CTUT</h2>
        <p style="font-family: Arial; font-size:12px; text-align: justify">Gửi {{ $data['HoTenHV'] }},</p>
        <p style="font-family: Arial; font-size:12px; text-align: justify">Cảm ơn bạn đã đăng ký khóa học.</p>


        <h3 style="font-family: Arial; color: grey">Chi tiết biên lai của bạn</h3>
        <hr/>
        <div style="border: 1px solid; overflow: hidden;">
            <div class="pull-left" style="padding: 15px 20px">
              <p>Trường ĐH KT-CN Cần Thơ</p>
              <p>Trung tâm ngoại ngữ-tin học</p>
            </div>
            <div class="pull-right"style="padding: 15px 20px ">
              <p>Số: {{$data['ID']}}</p>
            </div>
            <div style="margin-top:90px">
              <center><h3>Biên Lai Thu Học Phí</h3></center>
            </div>
            <div>
              <center>Ngày {{date('d', strtotime($data['NgayLap']))}} Tháng {{date('m', strtotime($data['NgayLap']))}} Năm {{date('Y', strtotime($data['NgayLap']))}}</center>
            </div>
            <div style="padding: 15px 20px;line-height: 15px;">
              <p><b>Họ và tên người nộp:</b> &nbsp {{ $data['HoTenHV'] }}</p>
              <div>
                <span class="pull-left"><b>Lớp:</b> &nbsp {{ $data['TenLop'] }}</span>
                <span class="pull-right"><b>Khóa:</b> &nbsp {{ $data['TenKhoa'] }}</span>
              </div>
              <br>
              <p style="padding-top: 15px;"><b>Ngày học:</b> &nbsp {{date('d/m/Y', strtotime($data['NgayKhaiGiang']))}}</p>
              <p><b>Số tiền thu:</b> &nbsp {{number_format($data['SoTien'])}} VND</p>
              <div class="pull-right">
                <p><h4><b>Người Thu</b></h4></p>
                <p>&nbsp</p>
                <p></p>
                <p>{{$data['HoTenCB']}}</p>
              </div>
            </div>
          </div>
        <hr>
        <p style="font-family: Arial; font-size:12px; text-align: justify">
           Chúng tôi chào đón bạn đến với khóa học tại trung tâm.
            <br>Xin cảm ơn.

        </p>

        <div style="width:570px">
          <img style="width: 570px;"src="https://trungtamnnth.ctuet.edu.vn/wp-content/uploads/2020/05/d71f9c4d5aaba0f5f9ba-300x199.jpg" alt="Trung tâm ngoại ngữ tin học CTUT"/>
        </div>

        <p style="font-family: Arial; font-size:11px; color: grey">
            Trung tâm ngoại ngữ tin học CTUT<br>
           	Số 256, Nguyễn Văn Cừ, Phường An Hòa, Quận Ninh Kiều, Thành phố Cần Thơ.<br>
            Điện thoại: 02923.890.698.<br>
            Email: trungtamnnth@ctuet.edu.vn.<br>
        </p>
    </div>
</div>
