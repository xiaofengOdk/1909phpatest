@extends("admin.layout.public")
@section("content")
    <!-- xugai窗口 -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">角色编辑</h3>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>角色名称</td>
                            <td><input  class="form-control" placeholder="角色名称">  </td>
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
    <div class="modal fade" id="esssditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">角色添加</h3>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>角色名称</td>
                            <td>
                                <input  class="form-control" id="role_name" placeholder="角色名称">  </td>
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
        //修改

    </script>
@endsection