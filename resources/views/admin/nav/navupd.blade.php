@extends("admin.layout.public")
@section("content")
        <!-- <div class="modal-dialog" style="background-color:white;">class="modal-dialog"  -->
            <div class="modal-content" style="width:100%; height:621px;">
                <div class="modal-header">
                    <h3 id="myModalLabel">品牌编辑</h3>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-striped"  width="800px"><!--class="table table-bordered table-striped"-->
                        <tr>
                            <td style="width:150px;">导航名称</td><!--form-control-->
                            <td><input  class="" style="width:200px;height:34px; border:1px solid #d2d6de" name="nav_name" id="nav_name" value="{{$info->nav_name}}"></td>
                        </tr>
                        <tr>
                            <td style="width:150px;">跳转网址</td><!--form-control-->
                            <td><input  class="" style="width:200px;height:34px; border:1px solid #d2d6de"  name="nav_url" id="nav_url" value="{{$info->nav_url}}"></td>
                        </tr>
                        <tr>
                            <td style="width:150px;">权重</td><!--form-control-->
                            <td><input  class="" style="width:200px;height:34px; border:1px solid #d2d6de"  name="nav_weigh" id="nav_weigh" value="{{$info->nav_weigh}}"></td>
                        </tr>
                        <tr>
                            <td>是否展示</td>
                            <td>
                                @if($info->is_show==1)
                                    <input  type="radio" value="1" name="is_show" checked>是
                                    <input  type="radio" value="2" name="is_show">否
                                @else
                                    <input  type="radio" value="1" name="is_show">是
                                    <input  type="radio" value="2" name="is_show" checked>否
                                @endif
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer" style="margin-right:1060px;">
                    <input type="button" id="but" class="btn btn-success" value="修改">
                </div>
            </div>
        <!-- </div> -->
<script>
    //添加
    $(document).on('click','#but',function(){
        var nav_id="{{$info->nav_id}}";
        var data={};
        data.nav_name = $('#nav_name').val();
        data.nav_url = $('#nav_url').val();
        data.nav_weigh = $('#nav_weigh').val();
        data.is_show = $("input[name='is_show']:checked").val();
        data.nav_id="{{$info->nav_id}}";
        // console.log(data);
        var url="/admin/nav_updo/"+nav_id;
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
</script>
@endsection

