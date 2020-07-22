@extends("admin.layout.public")
@section("content")

  <div>
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">商品分类编辑</h3>
		</div>
		<form action="{{url('/admin/slide_add')}}" method="post" enctype="multipart/form-data">
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>轮播图</td>
		      		<td><input type="file" id="fileupload" name="slide_log" class="form-control" > 
                      <img src="{{env('UPLOAD_URL')}}" width="150px" height="100px">  
                    </td>
		      	</tr>			  
				  <tr>
		      		<td>权重</td>
		      		<td><input type="text" id="fileupload" name="slide_weight" class="form-control" >  </td>
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