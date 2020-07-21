@extends("admin.layout.public")
@section("content")
  
</head>
   <div class="box-header with-border">
                        <h3 class="box-title">角色管理</h3>
                    </div>

                    <div class="box-body">


                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#esssditModal" ng-click="toAdd()">
											<i class="fa fa-file-o"></i> 新建</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();">
											<i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>

                            <!--工具栏/-->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th> 
										  <th class="sorting_asc">角色ID</th>
									      <th class="sorting">角色名称</th>
									      <th class="sorting">添加时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($data as $k=>$v)
									  <tr role_id="{{$v['role_id']}}">
										  <th class="" style="padding-right:0px">
											  <input id="selall" type="checkbox" class="icheckbox_square-blue">
										  </th>

										  <td>{{$v['role_id']}}</td>

										  <td pub="role_name">
											  <span class="upp">
													{{$v['role_name']}}
											  </span>
											  <input type="text" class="updo" style="display: none;" value="{{$v->role_name}}"/>
										  </td>

										  <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
										  <td class="text-center">
											  {{--<button type="button" class="btn btn-primary" >修改</button>--}}
											  <button type="button" class="btn btn-danger del">删除</button>
   <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal"  ng-click="toAdd()">									

												  权限添加</button>										   </td>
									  </tr>
								  @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->
	            <!-- 分页 -->
				{{$data->links()}}
				                
<!-- xugai窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">赋予权限</h3>
		</div>
		<div class="modal-body">							
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>权限名称</td>
		      		@foreach($right_model as $k=>$v)
		      		<td>
		      			<select class="r_id">
		      				<option   value="{{$v->right_id}}">{{$v->right_name}}</option>
		      			</select>
		      		 </td>
		      		@endforeach
		      	</tr>
			 </table>				
			
		</div>
		<div class="modal-footer">						 
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"  id="right_id" >赋予</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
<div class="modal fade" id="esssditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel">角色添加</h3>
								</div>
								<div class="modal-body">

									<table class="table table-bordered table-striped"  width="800px">
										<tr>
											<td>角色名称</td>
											<td><input  class="form-control" id="role_name" placeholder="角色名称">  </td>
										</tr>
									</table>

								</div>
								<div class="modal-footer">
									<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="add">提交</button>
									<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
								</div>
							</div>
						</div>
					</div>
</body>
</html>
<script>
	//添加
	$(document).on('click','#add',function(){
		var role_name=$("#role_name").val();
		$.ajax({
			url: "/admin/role_adds",
			type: 'post',
			data: {role_name:role_name},
			dataType: 'json',
			success: function (res) {
				if(res.code=='200'){
					window.location.href="{{'/role/list'}}"
				}else{
					alert(res.msg);
				}
			}
		});
	});
	//删除
	$(document).on('click','.del',function(){
		var role_id=$(this).parents('tr').attr('role_id');
		var data={};
		data.role_id=role_id;
		var url="/admin/role_Del";
		if(window.confirm("确认删除？")){
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(result){
					if(result['code']==00000){
						alert(result['msg']);
						location.href=result['url'];
					}else{
						alert(result['msg']);
						location.href=result['url'];
					}
				}
			})
		}
	});
	//即点几改
	$('.upp').click(function(){//让input框显示  自己隐藏
		var _this=$(this);
		_this.hide();
		_this.next('input').show();
	});
	$('.updo').blur(function(){  //当失去焦点的时候获取到 id 要修改的字段  值
		var _this=$(this);
		var role_id=_this.parents("tr").attr("role_id");//祖先级节点的自定义属性  id
		var field=_this.parent("td").attr("pub");//父节点  字段
		var _val=_this.val();  //获取值


		//发送ajax 把这三个值传过去
		var url="/admin/pth"
		$.ajax({
			url:url,
			data:{'role_id':role_id,'field':field,'_val':_val},
			dataType:'json',
			success:function(reg){
				//console.log(reg);
				if(reg.code=='00000'){
					window.location.reload()
				}
				if(reg.code=='00001'){
					window.location.reload()
				}
				if(reg.code=='00002'){
					alert(reg.message);
					window.location.reload()
				}
			}
		})
	});
	$(document).on('click','#right_id',function(){
		var right_id=$(".r_id").val()
		
	})
;</script>
	@endsection