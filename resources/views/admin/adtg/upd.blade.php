@extends("admin.layout.public")
@section("content")
        <!-- <div class="modal-dialog" style="background-color:white;">class="modal-dialog"  -->
<div class="modal-content" style="width:100%; height:621px;">
    <div class="modal-header">
        <h3 id="myModalLabel">广告编辑</h3>
    </div>
    <div class="modal-body">

        <table class="table table-bordered table-striped"  width="800px"><!--class="table table-bordered table-striped"-->
            <tr>
                <td style="width:150px;">广告名称</td><!--form-control-->
                <td>
                    <input  class="" style="width:200px;height:34px; border:1px solid #d2d6de" name="g_name" id="g_name"
                            value="{{$info->g_name}}">
                </td>
            </tr>
            <tr>
                <td style="width:150px;">广告描述</td><!--form-control-->
                <td><input  class="" style="width:200px;height:34px; border:1px solid #d2d6de"  name="g_desc" id="g_desc" value="{{$info->g_desc}}"></td>
            </tr>
            <tr>
                <td style="width:150px;">跳转地址</td><!--form-control-->
                <td><input  class="" style="width:200px;height:34px; border:1px solid #d2d6de"  name="g_url" id="g_url" value="{{$info->g_url}}"></td>
            </tr>
        </table>

    </div>
    <div class="modal-footer" style="margin-right:1060px;">
        <input type="button" id="but" class="btn btn-success" value="修改">
    </div>
</div>
<!-- </div> -->
<script>
    //修改
    $(document).on('click','#but',function(){
        var data={};
        data.g_name = $('#g_name').val();
        data.g_desc = $('#g_desc').val();
        data.g_url = $('#g_url').val();
        data.g_id="{{$info->g_id}}";

        var g_id="{{$info->g_id}}";
        $.ajax({
            url:"/admin/adtg_updo/"+g_id,
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
</script>
@endsection

