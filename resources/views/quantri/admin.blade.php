@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Quản trị</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background: white">
	<div class="panel panel-default">
		<div class="panel-body">
			<center><h1>Chào Mừng Bạn Đến Với Trang Quản Trị </h1></center>
			<hr>
			<img src="source/img/Quantri-1075x516.png" class="img-responsive" width="100%">
		</div>
	</div>
</div>

@endsection
@endif