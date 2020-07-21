@extends("admin.layout.public")
@section("content")

                    <div class="box-header with-border">
                        <h3 class="box-title">权限管理     
                       	</h3>
                    </div>

                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<a href="JavaScript:;" >权限管理</a> 
		                        </li>
		                        <li>
		                       		<a href="JavaScript:;" >展示</a>
		                        </li>
		                       
	                        </ol>

                        <!-- 数据表格 -->
                        <div class="table-box">
							
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="添加权限" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加权限</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-check"></i> 刷新</button>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		
                        
							<!--数据列表-->
							<form action="">
								权限：<input type="text" name="right_name">
								<input type="submit" value="搜索">
							</form>
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                              </th> 
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">权限</th>									   
									      <th class="sorting">url</th>
										  <th class="sorting">描述</th>		
										  <th class="sorting">时间</th>			
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($res as $k=>$v)
			                          <tr ids="{{$v->right_id}}">
			                              <td></td>			                              
				                          <td>{{$v->right_id}}</td>
									      <td right_name="right_name">
											 
											  <span class="span_test"> {{$v->right_name}}</span>
											  <input class="chang" type="text" value="{{$v->right_name}}" style="display:none">
											</td>									    
										  <td  right_name="right_url">
											  <span class="span_test"> {{$v->right_url}}</span>
											  <input class="chang" type="text" value="{{$v->right_url}}" style="display:none">
										  </td>
										  <td right_name="right_desc">
											  
											  <span class="span_test"> {{$v->right_desc}}</span>
											  <input class="chang" type="text" value="{{$v->right_desc}}" style="display:none">
											</td>		
											<td>{{date("Y-m-d",$v->add_time)}}</td>							      
		                                  <td class="text-center">		                                     
		                                      <button type="button" class="btn bg-olive btn-xs" id="del" rid="{{$v->right_id}}">删除</button> 		                                     
		                                 	  <!-- <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>                                            -->
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
			<h3 id="myModalLabel">权限添加</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				
		      	<tr>
		      		<td>权限</td>
		      		<td><input  class="form-control" id="right_name" placeholder="权限名">  </td>
		      	</tr>			  
				<tr>
		      		<td>url</td>
		      		<td><input  class="form-control" id="right_url" placeholder="url">  </td>
				</tr>	  
				<tr>
		      		<td>描述</td>
		      		<td><textarea name="right_desc" id="right_desc" id="" cols="30"  placeholder="描述" rows="10"></textarea> </td>
		      	</tr>    	
			 </table>				
			
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success bb" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
</body>
<script>
	$(document).on("click",".bb",function(){
		var right_name = $("#right_name").val();
		var right_url = $("#right_url").val();
		var right_desc = $("#right_desc").val();
		var data = {};
		 data.right_name = right_name;
		 data.right_url = right_url;
		 data.right_desc = right_desc;
		 var url = "{{url('/admin/right/add_right')}}";
		 $.ajax({
			 type:"post",
			 url:url,
			 data:data,
			 datetype:"json",
			 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
			success:function(res){
				if(res.success==false){
					alert(res.message);
				}
				if(res.success==true){
					alert(res.message);
				}
			}
		 })
		
	})
	$(document).on("click","#del",function(){
		var right_id = $(this).attr("rid");
		var url = "{{url('/admin/right/del')}}";
		var data = {};
		data.right_id = right_id; 
		if(window.confirm("是否删除")){
			$.ajax({
				type:"post",
				url:url,
				data:data,
				datetype:"json",
				headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
				success:function(res){
					if(res.success==true){
						alert(res.message);
						history.go(0);
					}
				}
			})
		}
	})
	$(document).ready(function(){
		$(".span_test").click(function(){
            var _this = $(this);
            _this.hide();
            _this.next("input").show();
            $(".chang").blur(function(){
                var _this = $(this);
                var zi = _this.val();
                var right_id = _this.parents("tr").attr("ids");
                var right_name = _this.parent("td").attr("right_name");
                var data = {};
                data.right_name = right_name;
                data.right_id = right_id;
                data.zi = zi;
               var url = "{{url('/admin/right/updateajax')}}";
                $.ajax({
                    type:"get",
                    data:data,
                    url:url,
                    dataType:"json",
                    success:function(res){
						// console.log(res)
					    if(res.success==true){
						alert(res.message);
						history.go(0);
						}
                    }
            })
            })
        })
	})
	// $(document).on("click",".pagination a",function(){
	// 	var url = $(this).attr("href");
	// 	$.get(url,function(result){
	// 		$("tbody").html(result);
	// 	})
	// 	return false;
	// })
</script>
@endsection