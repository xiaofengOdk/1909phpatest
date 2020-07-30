@extends("admin.layout.public")
@section("content")
  <div>
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">商品相册修改</h3>
		</div>
		<form action="{{url('/admin/gimgs_upddo/'.$res->id)}}" method="post" enctype="multipart/form-data">
		<div class="modal-body">							
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>商品相册</td>
		      		<td><input type="file" multiple id="file_upload" name="goods_imgs[]"> 
                                            @php $goods_imgs = explode("|",$res->goods_imgs); @endphp   
											@foreach($goods_imgs as $vv)
											<img src="{{env('UPLOAD_URL')}}{{$vv}}" with="60" height="60">
											@endforeach
                    </td>
		      	</tr>			  
				 
				  <tr>
		      		<td>是否展示</td>
		      		<td>
					 <input type="radio" id="fileupload"  name="is_shows" {{$res->is_shows==1?"checked":""}} value="1"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <input type="radio" id="fileupload"  name="is_shows" {{$res->is_shows==2?"checked":""}} value="2" >  否
					  
					  </td>
		      	</tr>   	
			 </table>				
		</div>
		<div class="modal-footer">						
			<input type="submit" class="btn btn-success" value="保存">
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
		</form>
	  </div>
	</div>
@endsection