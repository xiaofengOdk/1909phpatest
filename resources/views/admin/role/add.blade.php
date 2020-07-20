@extends("admin.layout.public")
@section("content")
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
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#esssditModal" ng-click="toAdd()"><i class="fa fa-file-o"></i> 新建</button>
                                        <button type="button" class="btn btn-default" title="删除" ng-click="dele()"><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
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
										  <td>{{$v['role_name']}}</td>
										  <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
										  <td class="text-center">
											  <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>
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
	            <!-- 分页 -->
				
				                
<!-- xugai窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">角色编辑</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>角色名称</td>
		      		<td><input  class="form-control" placeholder="角色名称">  </td>
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
</script>
	@endsection