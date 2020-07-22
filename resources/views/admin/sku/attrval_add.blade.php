@extends("admin.layout.public")
@section("content")
</head>
<body class="hold-transition skin-red sidebar-mini"  >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">属性值管理</h3>
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

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">属性值ID</th>
                <th class="sorting">属性名称</th>
                <th class="sorting">创建时间</th>
                <th class="sorting">属性名称</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr id="{{$v['id']}}">
                    <td>{{$v['id']}}</td>
                    <td>{{$v['attrval_name']}}</td>
                    <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
                    <td>{{$v['attr_name']}}</td>
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
<!-- 分页 -->


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
                        <td>属性值名称</td>
                        <td><input  class="form-control" id="attrval_name" placeholder="属性值名称"></td>
                    </tr>
                    <tr>
                        <td>属性ID</td>
                        <td>
                            <select id="attr_id">
                                @foreach($res as $k=>$v)
                                    <option   value="{{$v->attr_id}}">{{$v->attr_name}}</option>
                                @endforeach
                            </select>
                        </td>
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
        var attrval_name=$("#attrval_name").val();
        var attr_id=$('#attr_id').val();
//        console.log(attr_id);
//        return false;
        $.ajax({
            url: "/admin/attrval_adds",
            type: 'post',
            data: {attrval_name:attrval_name,attr_id:attr_id},
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
        var id=$(this).parents('tr').attr('id');
        var data={};
        data.id=id;
        var url="/admin/attrval_del";
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
</script>
@endsection