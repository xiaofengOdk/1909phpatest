@extends("admin.layout.public")
@section("content")
<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">广告管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ng-click="toAdd()">
											<i class="fa fa-file-o"></i> 新建
										</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();">
											<i class="fa fa-refresh"></i> 刷新
										</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">

                                {{--<div class="has-feedback">--}}
							        {{--名称：<input ><button class="btn btn-default" >查询</button>--}}
                                {{--</div>--}}

								<form action="" >
									<input type="text"  style="height:35px"name="g_name">
									<input type="submit" style="height:35px" class="btn bg-olive btn-xs" value="查询">
								</form>
                            </div>
                            <!--工具栏/-->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  <th class="sorting_asc">广告ID</th>
									      <th class="sorting">广告名称</th>
									      <th class="sorting">广告描述</th>
									      <th class="sorting">跳转地址</th>
										  <th class="sorting">创建时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($data as $k=>$v)
									  <tr g_id="{{$v['g_id']}}">
										  <td style="width: 80px;">{{$v['g_id']}}</td>
										  <td pub="g_name" style="width: 80px;">
											  <span class="jd">
													{{$v['g_name']}}
											  </span>
											  <input type="text" class="jds" style="display: none;" value="{{$v->g_name}}"/>
										  </td>
										  <td pub="g_desc" style="width: 500px;">
											  <span class="jd">
													{{$v['g_desc']}}
											  </span>
											  <input type="text" class="jds" style="display: none;" value="{{$v->g_desc}}"/>
										  </td>
										  <td pub="g_url" style="width: 150px;">
											  <span class="jd">
													{{$v['g_url']}}
											  </span>
											  <input type="text" class="jds" style="display: none;" value="{{$v->g_url}}"/>
										  </td>
										  <td style="width: 200px;">{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
										  <td class="text-center">
											  <a href="/admin/adtg_upd/{{$v->g_id}}">
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
			<h3 id="myModalLabel">广告编辑</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>广告名称</td>
		      		<td><input  class="form-control" id="g_name" placeholder="广告名称"></td>
		      	</tr>
		      	<tr>
		      		<td>广告描述</td>
		      		<td ><textarea id="g_desc" style="height: 50px;width: 500px;" >
						</textarea>
					</td>
		      	</tr>	
			    <tr>
		      		<td>跳转地址</td>
		      		<td><input  class="form-control" id="g_url" placeholder="跳转地址"></td>
		      	</tr>
			 </table>				
			
		</div>
		<div class="modal-footer">
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="add">提交</button>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
</body>
</html>
<script>
	//添加
	$(document).on('click','#add',function(){
		var g_name=$("#g_name").val();
		var g_desc=$("#g_desc").val();
		var g_url=$("#g_url").val();
		$.ajax({
			url: "/admin/adtg_adds",
			type: 'post',
			data: {g_name:g_name,g_desc:g_desc,g_url:g_url},
			dataType: 'json',
			success: function (res) {
				if(res.code=='00000'){
					window.location.href=res.url;
				}else{
					alert(res.msg);
				}
			}
		});
	});
	//删除
	$(document).on('click','.del',function(){
		var g_id=$(this).parents('tr').attr('g_id');
		var data={};
		data.g_id=g_id;
		var url="/admin/adtg_del";
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
	$('.jd').click(function(){//让input框显示  自己隐藏
		var _this=$(this);
		_this.hide();
		_this.next('input').show();
	});
	$('.jds').blur(function(){  //当失去焦点的时候获取到 id 要修改的字段  值
		var _this=$(this);
		var g_id=_this.parents("tr").attr("g_id");//祖先级节点的自定义属性  id
		var field=_this.parent("td").attr("pub");//父节点  字段
		var _val=_this.val();  //获取值
		//发送ajax 把这三个值传过去
		var url="/admin/pol"
		$.ajax({
			url:url,
			data:{'g_id':g_id,'field':field,'_val':_val},
			dataType:'json',
			success:function(reg){
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