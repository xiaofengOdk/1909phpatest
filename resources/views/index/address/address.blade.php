@extends("index.layout.public")
@include("index.layout.top")
@section("content")
    <!-- 头部栏位 -->
    <!--页面顶部-->

<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/static/index/js/widget/nav.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/citypicker/distpicker.data.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/citypicker/pages/userInfo/distpicker.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery/main.js"></script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                @include("index.layout.left")
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>地址</th>
                                        <th>联系电话</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reg as $k=>$v)
                                    <tr>
                                        <td>{{$v->user_name}}</td>
                                        <td>{{$v->province}}-{{$v->city}}-{{$v->area}}-{{$v->deta_address}}</td>
                                        <td>{{$v->tel}}</td>
                                        <td>
                                           
                                            <a href="/user/del/{{$v->id}}">删除</a>
                                            @if($v->is_moren==1)
                                            <a href="/user/default/{{$v->id}}">设为默认</a>
                                            @else
                                            <a  style='color:red;'>默认地址</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                          
                        </div>
                        <!--新增地址弹出层-->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/user/addressdo" class="sui-form form-horizontal" method="post">
                                            <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" name="user_name" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label for="inputPassword" class="control-label">所在地：</label>
                                        <div class="controls">
                                            <div data-toggle="distpicker" >
                                                <div class="form-group area">
                                                    <select class="form-control are" name="province" id="province1">
                                                    <option value="" selected="selected">请选择...</option>
                                                        @foreach($proInfo as $k=>$v)
                                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                                         @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group area" id="city">
                                                    <select class="form-control are" name="city" id="city1">
                                                    <option value="" selected="selected">请选择...</option>
                                                    </select>
                                                </div>
                                                <div class="form-group area" id="privo">
                                                    <select class="form-control are" name="area" id="district1">
                                                    <option value="" selected="selected">请选择...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" name="deta_address" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" name="tel" class="input-medium">
                                            </div>
                                        </div>
                                        
                                       
                                        </form>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
                                        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                    </div>
                                </div>
                            </div>
						</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部栏位 -->
    <!--页面底部-->
    @include('index.layout.foot');


    <script>
     /*给类为area绑定内容改变事件 */
     $(document).on('change','.are',function(){
         var _this=$(this);//当前内容改变对象
         _this.nextAll('select').html("<option value=''>请选择...</option>")
        //获取当前省份的id
         var id=_this.val();
        //通过ajax技术吧省份id传给控制器
         $.ajax({
               type:'get',
               data:{'id':id},
               url:'/user/getCity',
               dataType:'json',
               success:function(res){
                var _option='<option value="">请选择...</option>';
                    for(var i in res){
                       _option+="<option value='"+res[i]['id']+"'>"+res[i]['name']+"</option>";
                       //console.log(_option);
                       
                    }
                 _this.parent("div").next('div').find('select').html(_option);
               }
         });
        
     })
     $(document).on("click",".btn-large",function(){
        //  alert(1)
       var user_name= $("input[name='user_name']").val()
        var deta_address=$("input[name='deta_address']").val()
        var tel=$("input[name='tel']").val()
        var province=$("select[name='province']").val()
        var city=$("select[name='city']").val()
        var area=$("select[name='area']").val()
     //通过ajax把数据传给控制器
     $.ajax({
               type:'get',
               data:{'user_name':user_name,'deta_address':deta_address,'tel':tel,'province':province,'city':city,'area':area},
               url:'/user/addressdo',
               dataType:'json',
               success:function(reg){
                  if(reg.code=='00000'){
                       alert(reg.message);
                  }else{
                    alert(reg.message);
                  }
               }
         });
     })
  
  </script>