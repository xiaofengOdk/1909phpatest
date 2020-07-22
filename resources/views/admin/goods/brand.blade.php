@extends("admin.layout.public")
@section("content")

<div class="box-header with-border">
    <h3 class="box-title">品牌管理</h3>
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
                <th class="sorting_asc">品牌ID</th>
                <th class="sorting">品牌名称</th>
                <th class="sorting">品牌log</th>
                <th class="sorting">是否展示</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $k=>$v)
            <tr brand_id="{{$v->brand_id}}">
                <td>{{$v->brand_id}}</td>
                <td>
                    <span class="brand_name">{{$v->brand_name}}</span>
                    <input type="text" value="{{$v->brand_name}}" class="editbrand_name" style="display:none" brand_id="{{$v->brand_id}}">
                </td>
                <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_log}}" width="150px" height="100px"></td>
                <td>
                    <span class="is_show">
                    @if($v->brand_show ==1)
                        是
                    @else
                        否
                    @endif
                    </span>
                </td>
                <td class="text-center">
                    {{--<a href="javascript:;"> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal">修改</button></a>--}}



                    <a href="/admin/brandedit/{{$v->brand_id}}"><button type="button" class="btn btn-success">修改</button></a>
                    <!-- <button type="button" class="btn btn-success brand_ids" data-toggle="modal" data-target="#editModal">修改</button> -->


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
{{$info->links()}}
<!-- 编辑窗口 -->
<form method="post" action="/admin/brandupd" enctype="multipart/form-data">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">品牌编辑</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>品牌名称</td>
                        <td><input  class="form-control" placeholder="品牌名称" name="brand_name"> </td>
                    </tr>
                    <tr>
                        <td>品牌log</td>
                        <td><input  class="form-control" type="file" name="brand_log">  </td>
                    </tr>
                    <tr>
                        <td>是否展示</td>
                        <td>
                            <input  type="radio" value="1" name="brand_show" checked>是
                            <input  type="radio" value="2" name="brand_show">否
                        </td>
                    </tr>
                    <tr>
                        <td>品牌分类</td>
                        <td>
                            <select name="cate_id">
                                <option></option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <input type="submit" value="提交" class="btn btn-success"  aria-hidden="true">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- 添加窗口 -->
<form method="post" action="/admin/dobrand" enctype="multipart/form-data">
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">品牌添加</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>品牌名称</td>
                        <td><input  class="form-control" placeholder="品牌名称" name="brand_name"> </td>
                    </tr>
                    <tr>
                        <td>品牌log</td>
                        <td><input  class="form-control" type="file" name="brand_log">  </td>
                    </tr>
                    <tr>
                        <td>是否展示</td>
                        <td>
                            <input  type="radio" value="1" name="brand_show" checked>是
                            <input  type="radio" value="2" name="brand_show">否
                        </td>
                    </tr>
                    <tr>
                        <td>品牌分类</td>
                        <td>
                            <select name="cate_id">
                                <option></option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <input type="submit" value="提交" class="btn btn-success"  aria-hidden="true">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    //删除
    $(document).on('click','.del',function(){
        var brand_id=$(this).parents('tr').attr('brand_id');
        var data={};
        data.brand_id=brand_id;
        var url="/admin/delbrand";
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
//品牌名称的即点即改
$(document).on('click','.brand_name',function(){
    $(this).hide();
    $(this).next('input').show();
})
$(document).on('blur','.editbrand_name',function(){
    var _this = $(this);
    var info = _this.val();
    var id = _this.attr('brand_id');
//            console.log(info);return false;
    if(info == ''){
        $('.brand_name').show();
        $(this).hide();
//                loaction.reload(false);
        window.location.reload();
        return false;
    }
    var url = '/admin/editbrand_name';
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
    //是否展示的即点即改
    $(document).on('click','.is_show',function(){
        var _this = $(this);
        var info = _this.html();
        var info = $.trim(info);
        if(info == '是'){
            var val=2;
        }else{
            var val=1;
        }
        var id = $(this).parents('tr').attr('brand_id');
        var url = '/admin/editbrand_show';
        var data = {val:val,id:id};
//            console.log(data);return false;
        $.ajax({
            url:url,
            data:data,
            type:'post',
            dataType:'json',
            success:function(res){
//                    console.log(res);
                if(res.code == 00000){
                    if(info == '是'){
                        _this.text('否');
                    }else{
                        _this.text('是');
                    }
                }
            }
        })
    })
        // $(document).on('click','.brand_ids',function(){
        //     var _this=$(this)
        //     // console.log(_this)
        //     var brand_id=_this.parents("tr").attr("brand_id")
        //     // console.log(brand_id);
        //     var url="/admin/brandedit/"+brand_id;
        //     var data={brand_id:brand_id};
        //     $.ajax({
        //         url:url,
        //         data:data,
        //         type:'post',
        //         dataType:'json',
        //         success:function(res){
        //             console.log(res);
        //         }
        //     })
    // })
</script>
@endsection
