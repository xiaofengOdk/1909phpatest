@extends("admin.layout.public")
@section("content")
<form method="post" action="/admin/brandupd/{{$info->brand_id}}" enctype="multipart/form-data">
    @csrf
        <!-- <div class="modal-dialog" style="background-color:white;">class="modal-dialog"  -->
        
            <div class="modal-content" style="width:100%; height:621px;">
                <div class="modal-header">
                    <h3 id="myModalLabel">品牌编辑</h3>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-striped"  width="800px"><!--class="table table-bordered table-striped"-->
                        <tr>
                            <td style="width:150px;">品牌名称</td><!--form-control-->
                            <td><input  class="" style="width:200px;height:34px; border:1px solid #d2d6de" placeholder="品牌名称" name="brand_name" value="{{$info->brand_name}}"></td>
                        </tr>
                        <tr>
                            <td>品牌log</td>
                            <td><input style="width:200px;height:34px; border:1px solid #d2d6de"  type="file" name="brand_log">
                                <img src="{{env('UPLOAD_URL')}}{{$info->brand_log}}" width="50px" height="50px"></td>
                        </tr>
                        <tr>
                            <td>是否展示</td>
                            <td>
                                @if($info->brand_show==1)
                                    <input  type="radio" value="1" name="brand_show" checked>是
                                    <input  type="radio" value="2" name="brand_show">否
                                @else
                                    <input  type="radio" value="1" name="brand_show">是
                                    <input  type="radio" value="2" name="brand_show" checked>否
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>品牌分类</td>
                            <td>
                                <select name="cate_id">
                                    <option value="">--请选择--</option>
                                    @foreach($cateinfo as $k=>$v)
                                        <option value="{{$v->cate_id}}" @if($v->cate_id==$info->cate_id) selected @endif>{{str_repeat('—',$v->level*3)}}{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer" style="margin-right:1060px;">
                    <input type="submit" class="btn btn-success" value="修改">
                </div>
            </div>
        <!-- </div> -->
</form>
@endsection
