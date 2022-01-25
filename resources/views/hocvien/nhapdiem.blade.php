@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Nhập Điểm</title>
<style type="text/css">
  #table table{
    width: 100%;
  }
  #table table tr{
    border: 1px solid;
    text-align: center;
  }
  #table table tr td{
    border: 1px solid
  }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<center><h3>Nhập Điểm Học Viên</h3></center>
	<form class="form-horizontal" method="post" action="{{route('nhap-diem-export')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="panel panel-default">
		<div class="panel-body" style="line-height: 20px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				        <div class="form-group">
				          <select id="chungchi" class="form-control" style="width: 95%" name="chungchi">
				           <option>--Chọn Chứng Chỉ --</option>
				            @foreach($chungchi as $cc)
				            <option value="{{$cc->ID}}">{{$cc->TenChungChi}}</option>
				            @endforeach
				          </select>
				        </div>
				      </div>
				      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				        <div class="form-group">
				          <select class="form-control" id="lopthi" style="width: 95%" name="lopthi">

				          </select>
				        </div>
				      </div>
				      <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
				        <div class="form-group pull-left">
				          <input type="button" name="btnLoc" class="btn btn-default" value="Lọc" id="btnLoc">
				        </div>
				      </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div id="banghocvien"></div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
       $("#chungchi").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenlopthi/"+ID, function(data){
          $('#lopthi').html(data);
          $('#tt').hide();
          $('#Nhapdiemexport').hide();
        });
      });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
	 $('#btnLoc').click(function(){
	        var ID = $('#lopthi').val();
	          window.location= 'ajax/nhapdiem/'+ID;
	        
	       });
	});
</script>
@endsection
@endif