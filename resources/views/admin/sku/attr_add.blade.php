@extends("admin.layout.public")
@section("content")
<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">属性管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建"
												data-toggle="modal" data-target="#editModal" ng-click="toAdd()">
											<i class="fa fa-file-o"></i> 新建
										</button>
                                        <button type="button" class="btn btn-default" title="刷新"
												onclick="window.location.reload();">
											<i class="fa fa-refresh"></i> 刷新
										</button>
                                    </div>
                                </div>
                            </div>
                            <!--工具栏/-->
							<div class="box-tools pull-right">
								<form action="" >
									<b>属性名称</b><input type="text"  style="height:35px"name="attr_name">
									<input type="submit" style="height:35px" class="btn bg-olive btn-xs" value="属性查询">
								</form>
							</div>
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  <th class="sorting_asc">属性ID</th>
									      <th class="sorting">属性名称</th>
									      <th class="sorting">创建时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($data as $k=>$v)
									  <tr attr_id="{{$v['attr_id']}}">
										  <td>{{$v['attr_id']}}</td>
										  <td pp="attr_name">
											 <span class="jd">{{$v['attr_name']}}</span>
											  <input type="text" class="ad" style="display: none;" value="{{$v->attr_name}}"/>
										  </td>
										  <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
										  <td class="text-center">
											  <a href="/admin/attr_upd/{{$v->attr_id}}">
												  <button type="button" class="btn btn-success">修改</button>
											  </a>
											  <button type="button" class="btn btn-danger del">删除</button>
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
 				 {{$data->appends(request()->input())->links()}}
				                
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">属性编辑</h3>
		</div>
		<div class="modal-body">
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>属性名称</td>
		      		<td><input  class="form-control" id="attr_name" placeholder="属性名称"></td>
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
		var attr_name=$("#attr_name").val();
		$.ajax({
			url: "/admin/attr_adds",
			type: 'post',
			data: {attr_name:attr_name},
			dataType: 'json',
			success: function (res) {
				if(res.code=='200'){
					window.location.href=res.url;
				}else{
					alert(res.msg);
				}
			}
		})
	});
	//删除
	$(document).on('click','.del',function(){
		var attr_id=$(this).parents('tr').attr('attr_id');
		var data={};
		data.attr_id=attr_id;
		var url="/admin/attr_del";
		if(window.confirm("确认删除？")){
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(result){
					if(result['code']==200){
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
	//即点即改
	$('.jd').click(function(){//让input框显示  自己隐藏
		var _this=$(this);
		_this.hide();
		_this.next('input').show();
	})
	$('.ad').blur(function(){  //当失去焦点的时候获取到 id 要修改的字段  值
		var _this=$(this);
		var attr_id=_this.parents("tr").attr("attr_id");//祖先级节点的自定义属性  id
		var field=_this.parent("td").attr("pp");//父节点  字段
		var _val=_this.val();  //获取值

		//发送ajax 把这三个值传过去
		var url="/admin/attr_pth";
		$.ajax({
			url:url,
			data:{'attr_id':attr_id,'field':field,'_val':_val},
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
</script>
@endsection