@extends("admin.layout.public")
@section("content")

                    <div class="box-header with-border">
                        <h3 class="box-title">分类管理     
                       	</h3>
                    </div>

                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<a href="JavaScript:;" >分类管理</a> 
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
                                        <button type="button" class="btn btn-default" title="添加分类" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加分类</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-check"></i> 刷新</button>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		
                        
							<!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                              </th> 
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">名称</th>									   
									      <th class="sorting">是否</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($res as $k=>$v)
			                          <tr ids="{{$v->cate_id}}">
			                              <td></td>			                              
				                          <td>{{$v->cate_id}}</td>
									      <td cate_name="cate_name">
											  <span class="span_test">
											  	{{$v->cate_name}}
											  </span>
											  <input class="chang" type="text" value="{{$v->cate_name}}" style="display:none">
											</td>									    
										  <td >
											  <span class="span_test"> {{$v->right_url}}</span>
										  </td>
											<td>{{$v->cate_show=="1"?"是":"否"}}</td>							      
		                                  <td class="text-center">		                                     
		                                      <button type="button" class="btn bg-olive btn-xs" id="del" rid="{{$v->cate_id}}">删除</button> 		                                     
		                                 	  <!-- <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>                                            -->
		                                  </td>
			                          </tr>
									@endforeach
								  </tbody>
								  
							  </table>
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
			<h3 id="myModalLabel">分类添加</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				
		      	<tr>
		      		<td>分类</td>
		      		<td><input  class="form-control" id="cate_name" placeholder="分类名">  </td><br>
		      	</tr>	
		      	<tr>
		      		<td>所属pid</td>
		      		<td>
		      			<select name="parent_id" style="border:1px;padding-left: 2px;">
		      				<option value="0">顶级分类</option>
		      				@foreach($res as $k=>$v)
		      				<option value="{{$v->parent_id}}">{{$v->cate_name}}</option>
		      				@endforeach
		      			</select> 
		      		</td>
		      	</tr>			       	

			 </table>				
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success bb" data-dismiss="modal"  aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
</body>
<script>
	$(document).on("click",".bb",function(){
		var cate_name = $("#cate_name").val()
		var pid=$("select[name='parent_id']").val()
		var data = {};
		 data.cate_name = cate_name;
		 data.pid = pid;
		 // console.log(data);
		 // return false;
		 var url = "{{url('/admin/cate_adds')}}";
		 $.ajax({
			 type:"post",
			 url:url,
			 data:data,
			 datetype:"json",
			 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
			success:function(res){
				// console.log(res)
				if(res.success==false){
					alert(res.message);
				}
				if(res.success=="success"){
					alert(res.message);
						history.go(0);
				}
			}
		 })
		
	})
	$(document).on("click","#del",function(){
		var cate_del = $(this).attr("rid");
		var url = "{{url('/admin/cate_del')}}";
		var data = {};
		data.cate_del = cate_del; 
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
					// console.log(res)
					// if(res.success==true){
						alert(res.message);
						history.go(0);
					// }
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
                var cate_id = _this.parents("tr").attr("ids");
                var cate_name = _this.parent("td").attr("cate_name");
                var data = {};
                data.cate_name = cate_name;
                data.cate_id = cate_id;
                data.zi = zi;
                // console.log(data)
                // return false
               var url = "{{url('/admin/cate_ji')}}";
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