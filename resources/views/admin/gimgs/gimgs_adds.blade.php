@extends("admin.layout.public")
@section("content")
    <link rel="stylesheet" href="/static/chajian/uploadify.css">
	<script src="/static/chajian/jquery.js"></script>
	<script src="/static/chajian/jquery.uploadify.js"></script>
                    <div class="box-header with-border">
                        <h3 class="box-title">商品相册     
                       	</h3>
                    </div>

                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<a>商品相册</a> 
		                        </li>
		                        <li>
		                       		<a>展示</a>
		                        </li>
		                       
	                        </ol>

                        <!-- 数据表格 -->
                        <div class="table-box">
							
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="添加权限" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-check"></i> 刷新</button>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		
                        
							<!--数据列表-->
						
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                             
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">商品</th>									   
									      <th class="sorting">商品子图片</th>
										 
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($res2 as $k=>$v)
			                          <tr>
			                              <td>{{$v->id}}</td>			                              
				                          <td>{{$v->goods_name}}</td>	
                                          <td>					      
											  @php $goods_imgs = explode("|",$v->goods_imgs); @endphp   
											@foreach($goods_imgs as $vv)
											<img src="{{env('UPLOAD_URL')}}{{$vv}}" with="60" height="60">
											@endforeach
											</td>	
			                          </tr>
									@endforeach
								  </tbody>
								  
							  </table>
							  <p></p>
			                  <!--数据列表/-->                      
						
                        </div>
                        <!-- 数据表格 /-->
                        
                        
                        
                        
                     </div>
                    <!-- /.box-body -->
              
                                
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">权限添加</h3>
		</div>
		<div class="modal-body">							
			<form action="{{url('/admin/gimgs_add')}}" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-striped"  width="800px">
				
		      	<tr>
		      		<td>商品id</td>
		      		<td>
                        <select name="goods_id">
                        @foreach($res as $k=>$v)
                            <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                        @endforeach
                        </select>  
                    </td>
		      	</tr>			  
				<tr>
		      		<td>商品相册</td>
		      		<td><input type="file" multiple id="file_upload" name="goods_imgs[]"></td>
				</tr>	  
			 </table>				
            
		</div>
		<div class="modal-footer">						
            <input type="submit" class="btn btn-success bb" value="保存">
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
        </form>
	  </div>
	</div>
</div>
<script>
   
//     $(document).ready(function(){
//         $("#file_upload").uploadify({
//             swf : "/static/chajian/uploadify.swf",
//             uploader: "gimgs_add",
//             onUploadSuccess:function(rest,data,info){

//             }
//         })

//     })

</script>

@endsection