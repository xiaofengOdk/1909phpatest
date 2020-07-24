@extends("admin.layout.public")
@section("content")
        <!-- <div class="modal-dialog" style="background-color:white;">class="modal-dialog"  -->
<div class="modal-content" style="width:100%; height:621px;">
    <div class="modal-header">
        <h3 id="myModalLabel">属性值编辑</h3>
    </div>
    <div class="modal-body">

        <table class="table table-bordered table-striped"  width="800px"><!--class="table table-bordered table-striped"-->
            <tr>
                <td style="width:150px;">属性值名称</td><!--form-control-->
                <td>
                    <input  class="" style="width:200px;height:34px; border:1px solid #d2d6de" name="attrval_name" id="attrval_name"
                            value="{{$info->attrval_name}}">
                </td>
            <tr>
                <td>属性ID</td>
                <td>
                    <select id="attr_id">
                        @foreach($res as $k=>$v)
                            <option value="{{$v->attr_id}}" @if($v->attr_id==$info->attr_id) selected @endif>{{$v->attr_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
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
        var id="{{$info->id}}";
        var data={};
        data.attrval_name = $('#attrval_name').val();
        data.id="{{$info->id}}";
        $.ajax({
            url:"/admin/attrval_updo/"+id,
            data:data,
            type:'post',
            dataType:'json',
            success:function(res){
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

