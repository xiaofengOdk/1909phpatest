@extends("admin.layout.public")
@section("content")
<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
        
                    <div class="box-header with-border">
                        <h3 class="box-title">用户管理</h3>
                    </div>
        
                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#addModal" ><i class="fa fa-file-o"></i> 新建</button> -->
                                        <!-- <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button> -->
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-tools pull-right">
                                <div class="has-feedback">

                                </div>
                            </div>
                            <!--工具栏/-->
                            <form action=""  >
								<input type="text"  style="height:35px"name="admin_name" style="margin-left:150px;">
								<input type="submit" style="height:35px" class="btn bg-olive btn-xs" value="搜索">
							</form>
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                             
										  <th class="sorting_asc">用户ID</th>
									      <th class="sorting">用户名称</th>

					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($reg as $k=>$v)
			                          <tr admin_id="{{$v->admin_id}}">
			                           
				                          <td>{{$v->admin_id}}</td>
									      <td pub="admin_name" >
                                              <input type="text" value="{{$v->admin_name}}" class="updo" style="display: none;"/>
                                              <span class="upp">{{$v->admin_name}}</span>

                                          </td>
                                          <td>
		                                  <td class="text-center">

                                              <button type="button" class="btn bg-olive btn-xs  fu" data-toggle="modal" data-target="#roleModal" data-admin_id="{{$v->admin_id}}">赋予角色</button>
                                              <button type="button" class="btn bg-olive btn-xs fl" data-toggle="modal" data-target="#delModal" data-admin_id="{{$v->admin_id}}"  >删除</button>
		                                  </td>
			                          </tr>
									  @endforeach
                                      
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->


                        </div>
                        <!-- 数据表格 /-->




                     </div>
                    {{$reg->links()}}
<!-- 编辑窗口 -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">品牌编辑</h3>
		</div>
		<div class="modal-body">
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>品牌名称</td>
		      		<td><input  class="form-control" placeholder="品牌名称" >  </td>
		      	</tr>
		      	<tr>
		      		<td>首字母</td>
		      		<td><input  class="form-control" placeholder="首字母">  </td>
		      	</tr>
			 </table>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>

<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " >
  <input type="hidden" name="admin_id">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">赋予角色</h3>
		</div>
		<div class="modal-body admin_user_id">
		<div class="modal-body">

			<table class="table table-bordered table-striped"  width="800px">
                
		      	<tr>

		      		<td>
                      <select name="role" style='width:150px; padding-left:50px; ' >
                      @foreach($regs as $k=>$v)
                      <option  value="{{$v->role_id}}">{{$v->role_name}}</option>
                      @endforeach
                      </select>
                      </td>
		      	</tr>

			 </table>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success ro" data-dismiss="modal" aria-hidden="true" >保存</button>
		      		<td><input type="checkbox" > {{$v->role_name}} </td>
		      	</tr>
		        @endforeach
			 </table>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
  <input type="hidden" name="admin_id">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">删除用户</h3>
		</div>


		<div class="modal-footer">
			<button class="btn btn-success del" data-dismiss="modal"  aria-hidden="true">确定</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>
		</div>
	  </div>
	</div>
</div>

</body>
</html>
       {{$reg->appends(request()->input())->links()}}
<script>
     //用户赋予角色的用户id
    $(document).on("click",".fu",function(){
        var admin_id = $(this).data("admin_id");
        $("input[name='admin_id']").val(admin_id);
       
        // return false;
        
    })

    //删除的用户id
    $(document).on("click",".fl",function(){
        var admin_id = $(this).data("admin_id");
        $("input[name='admin_id']").val(admin_id);
       
        // return false;
        
    })

    $(document).on('click',".ro",function(){
       var admin_id= $("input[name='admin_id']").val();
       var rid=$("select[name='role']").val();
       var url="http://www.1909a3.com/admin/udo"
        var data={rid:rid,admin_id:admin_id}
              $.ajax({
                  data:data,
                  url:url,
                  type:'post',
                  dataType:'json',
                  success:function(reg){
                   // console.log(reg)
                       if(reg.code=='00000'){
                           alert(reg.message);
                           location.href=reload();
                       }
                       if(reg.code=='00004'){
                           alert(reg.message);
                            return false;
                       }
                  }
              })
    })




    $(document).on("click",".del",function(){
        var admin_id= $("input[name='admin_id']").val();
           
        // console.log(admin_id)
        // return false
        var url="http://www.1909a3.com/admin/del"
        var data={admin_id:admin_id}
              $.ajax({
                  data:data,
                  url:url,
                  type:'post',
                  dataType:'json',
                  success:function(reg){
                //    console.log(reg)
                       if(reg.code=='00000'){
                           alert(reg.message);
                            //  history.go(0);
                            location.href="http://www.1909a3.com/admin/ushow?page=1"
                       }
                       if(reg.code=='00001'){
                           alert(reg.message);
                            return false;
                       }
                  }
              })
    })


    $('.upp').click(function(){//让input框显示  自己隐藏
          var _this=$(this);
          _this.hide();
          _this.prev('input').show();
    })

    $('.updo').blur(function(){  //当失去焦点的时候获取到 id 要修改的字段  值
        var _this=$(this);
        var admin_id=_this.parents("tr").attr("admin_id");//祖先级节点的自定义属性  id
        var field=_this.parent("td").attr("pub");//父节点  字段
        var _val=_this.val();  //获取值
        //console.log(admin_id,field,_val);
        //发送ajax 把这三个值传过去
          var url="/admin/jupdo"
            $.ajax({
                 url:url,
                 data:{'admin_id':admin_id,'field':field,'_val':_val},
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
    })


    //   //无刷新页面
    //   $(document).on('click','.pagination a',function(){
    //    		//  alert('123');
    //    		 var url=$(this).attr('href');

    //    		    $.get(url,function(result){
    //               $('tbody').html(result);
    //    			});
    //    		return false;

    //     })

</script>
@endsection
