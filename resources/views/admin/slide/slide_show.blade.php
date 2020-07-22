@extends("admin.layout.public")
@section("content")
	<link rel="stylesheet" href="/static/chajian/uploadify.css">
	<script src="/static/chajian/jquery.js"></script>
	<script src="/static/chajian/jquery.uploadify.js"></script>
                    <div class="box-header with-border">
                        <h3 class="box-title">轮播图管理     
                       	</h3>
                    </div>

                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<th>轮播图</th>
		                        </li>
		                        <li>
                                       <th>查看</th>
		                        </li>
		                       
	                        </ol>

                        <!-- 数据表格 -->
                        <div class="table-box">
							
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="添加" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();" ><i class="fa fa-check"></i> 刷新</button>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		
                        
			                <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                             
										  <th class="sorting_asc">id</th>
									      <th class="sorting">图片</th>									   
									      <th class="sorting">是否展示</th>
										  <th class="sorting">权重</th>
										  <th class="sorting">时间</th>		
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($res as $k=>$v)
			                          <tr >
				                          <td>{{$v->slide_id}}</td>
									      <td>
										  <img src="{{env('UPLOAD_URL')}}{{$v->slide_log}}" width="150px" height="100px">
										  </td>									    
									      <td>
										  @if($v->is_show==1)
										  	是
										  @endif
										  @if($v->is_show==2)
										  	否
										  @endif
										  </td>
									      <td>{{$v->slide_weight}}</td>									    
									      <td>{{date("Y-m-d",$v->add_time)}}</td>
		                                  <td class="text-center">		                                     
		                                      <button type="button" slide_id="{{$v->slide_id}}" class="btn bg-olive btn-xs" del>删除</button> 	
		                                 	  <a href="{{url('/admin/slide_upd/'.$v->slide_id)}}" class="btn bg-olive btn-xs">修改</a>                                         
		                                  </td>
			                          </tr>
									@endforeach
			                      </tbody>
			                  </table>
							  <p>{{$res->links()}}</p>
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
			<h3 id="myModalLabel">轮播图添加</h3>
		</div>
		<form action="{{url('/admin/slide_add')}}" method="post" enctype="multipart/form-data">
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>轮播图</td>
		      		<td><input type="file" id="fileupload" name="slide_log" class="form-control" >  </td>
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
</div>
<script>
//     $(function() {
//         $('#fileupload').uploadify({
// 			swf : "/static/chajian/uploadify.swf",
// 			   uploader: "slide_add",
//             buttonText : "上传",
// 	onUploadSuccess:function(msg,newFilePath,info){
// 				// var video_str='<img src="'+newFilePath+'" controls="controls">';
// 				// $(".baTop").append(video_str);
// 				console.log(newFilePath)
// 			}
//         });
//     });
</script>

@endsection