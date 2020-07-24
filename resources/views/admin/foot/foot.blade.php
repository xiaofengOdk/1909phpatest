@extends("admin.layout.public")
@section("content")

    <div class="box-header with-border">
        <h3 class="box-title">友情链接管理</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#createModal" ><i class="fa fa-file-o"></i> 新建</button>
                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                    </div>
                </div>
            </div>
            <div class="box-tools pull-right">
                <div class="has-feedback">

                </div>
            </div>
            <!--工具栏/-->
            <form type="get">
                &nbsp;&nbsp;&nbsp;链接名称：<input  class="" style="width:200px;height:34px; border:1px solid #d2d6de" placeholder="链接名称" name="foot_name">
                <input type="submit" value="搜索">
            </form>
            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">ID</th>
                    <th class="sorting">链接名称</th>
                    <th class="sorting">链接地址</th>
                    <th class="sorting">权重</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($info as $k=>$v)
                    <tr foot_id="{{$v->id}}">
                        <td>{{$v->id}}</td>
                        <td>
                            {{$v->foot_name}}
                        </td>
                        <td>{{$v->foot_url}}</td>
                        <td>{{$v->is_weight}}</td>
                        <td class="text-center">
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
    {{$info->appends(request()->input())->links()}}

            <!-- 添加窗口 -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">添加友情链接</h3>
                    </div>
                    <div class="modal-body">

                        <table class="table table-bordered table-striped"  width="800px">
                            <tr>
                                <td>链接名称</td>
                                <td><input  class="form-control" placeholder="链接名称" name="foot_name" id="foot_name"> </td>
                            </tr>
                            <tr>
                                <td>链接地址</td>
                                <td><input  class="form-control" placeholder="链接地址" name="foot_url" id="foot_url"> </td>
                            </tr>
                            <tr>
                                <td>权重</td>
                                <td><input  class="form-control" placeholder="权重" name="is_weigh" id="is_weight"> </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="button" id="but" class="btn btn-success" value="提交">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                    </div>
                </div>
            </div>
        </div>

    <script>
        //添加
        $(document).on('click','#but',function(){
            var data={};
            data.foot_name=$('#foot_name').val();
            data.foot_url=$('#foot_url').val();
            data.is_weight=$('#is_weight').val();
            var url='/admin/foot_adds';
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(res){
//                    console.log(res);
                    if(res.code==00000){
                        location.href=res.url;
                    }else{
                        alert(res.msg);
                        location.href=res.url;
                    }
                }
            })
        })
        //删除
        $(document).on('click','.del',function(){
            var foot_id=$(this).parents('tr').attr('foot_id');
            var data={};
            data.id=foot_id;
            var url="/admin/foot_del";
            if(window.confirm("确认删除吗？")){
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
    </script>
@endsection
