@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Danh sách thi</title>
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
	<center><h3>Danh Sách Thi</h3></center>
	<div class="panel panel-default">
		<div class="panel-body" style="line-height: 20px;">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select id="chungchi" class="form-control" style="width: 90%" name="chungchi">
           <option>--Chọn Chứng Chỉ --</option>
            @foreach($chungchi as $cc)
            <option value="{{$cc->ID}}">{{$cc->TenChungChi}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select class="form-control" id="lopthi" style="width: 90%" name="lopthi">
          	<option value=""></option>
          </select>
        </div>
      </div>
       <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <input type="button" name="btnLoc" value="Lọc" class="btn btn-default" id="btnLoc">
        </div>
      </div>
		</div>
	</div>
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
        });
      });
       $('#btnLoc').click(function(){
       	let ID = $("#lopthi").val();
       	if (ID =="") {
       		alert('Bạn chưa chọn lớp thi nào');
       	}
       	else{
    			$.get("ajax/bangdanhsachthi/"+ID,function(data){
                    $("#banghocvien").html(data);
                });
       	}
       });

  });
</script>
@endsection
@endif