@extends("admin.layout.public")
@section("content")

<div class="box-header with-border">
    <h3 class="box-title">导航管理</h3>
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

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">导航ID</th>
                <th class="sorting">导航名称</th>
                <th class="sorting">跳转网址</th>
                <th class="sorting">权重</th>
                <th class="sorting">是否展示</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($nav_info as $k=>$v)
                <tr nav_id="{{$v->nav_id}}">
                    <td>{{$v->nav_id}}</td>
                    <td>
                        <span class="nav_name">{{$v->nav_name}}</span>
                        <input type="text" value="{{$v->nav_name}}" class="editnav_name" style="display:none" nav_id="{{$v->nav_id}}">
                    </td>
                    <td>{{$v->nav_url}}</td>
                    <td>{{$v->nav_weigh}}</td>
                    <td>
                        @if($v->is_show==1)
                            是
                        @else
                            否
                        @endif
                    </td>
                    <td class="text-center">
                       <a href="/admin/nav_upd/{{$v->nav_id}}"> <button type="button" class="btn btn-success">修改</button></a>
                        <!-- <button type="button" class="btn btn-success brand_ids" data-toggle="modal" data-target="#editModal">修改</button> -->
                        <button type="button" class="btn btn-danger del">删除</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
        {{$nav_info->links()}}

    </div>
    <!-- 数据表格 /-->




</div>
<!-- /.box-body -->
<!-- 添加窗口 -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">导航添加</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>导航名称</td>
                        <td><input  class="form-control" type="text" placeholder="导航名称" name="nav_name" id="nav_name"> </td>
                    </tr>
                    <tr>
                        <td>跳转网址</td>
                        <td><input  class="form-control"  type="text" placeholder="跳转网址" name="nav_url" id="nav_url">  </td>
                    </tr>
                    <tr>
                        <td>权重</td>
                        <td><input  class="form-control" type="text" placeholder="权重" name="nav_weigh" id="nav_weigh">  </td>
                    </tr>
                    <tr>
                        <td>是否展示</td>
                        <td>
                            <input  type="radio" value="1" name="is_show" checked>是
                            <input  type="radio" value="2" name="is_show">否
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="but"  aria-hidden="true">提交</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>

<script>
    //添加
    $(document).on('click','#but',function(){
        var data={};
        data.nav_name = $('#nav_name').val();
        data.nav_url = $('#nav_url').val();
        data.nav_weigh = $('#nav_weigh').val();
        data.is_show = $("input[name='is_show']:checked").val();
        // console.log(data);
        var url="/admin/nav_adds";
        $.ajax({
            url:url,
            data:data,
            type:'post',
            dataType:'json',
            success:function(res){
//                console.log(res);
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
        var nav_id=$(this).parents('tr').attr('nav_id');
        var data={};
        data.nav_id=nav_id;
        var url="/admin/nav_dels";
        if(window.confirm("确认删除吗？")){
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(res){
//                    console.log(res);
                    if(res.code==00000){
                        alert(res.msg);
                        location.href=res.url;
                    }else{
                        alert(res.msg);
                        location.href=res.url;
                    }
                }
            })
        }
    });
//导航名称的即点即改
$(document).on('click','.nav_name',function(){
    $(this).hide();
    $(this).next('input').show();
})
$(document).on('blur','.editnav_name',function(){
    var _this = $(this);
    var info = _this.val();
    var id = _this.attr('nav_id');
//            console.log(info);return false;
    if(info == ''){
        $('.nav_name').show();
        $(this).hide();
//                loaction.reload(false);
        window.location.reload();
        return false;
    }
    var url = '/admin/nav_jidian';
    var data = {info:info,id:id};
    $.ajax({
        url:url,
        data:data,
        type:'post',
        dataType:'json',
        success:function(res){
            if(res.code == 00000){
//                        _this.prev('span').text(info).show();
//                        _this.hide();
                window.location.reload();
            }
        }
    })
})
</script>
@endsection
