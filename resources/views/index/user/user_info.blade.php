@extends("index.layout.public")
@section("content")
@include("index.layout.top")
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
<script type="text/javascript" src="/static/index/js/plugins/birthday/birthday.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/citypicker/distpicker.data.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/citypicker/distpicker.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/upload/uploadPreview.js"></script>
<script type="text/javascript" src="/static/index/js/pages/main.js"></script>

<script>
            $(function() {               
                $.ms_DatePicker({
                    YearSelector: "#select_year2",
                    MonthSelector: "#select_month2",
                    DaySelector: "#select_day2"
                });
            });
        </script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                @include("index.layout.left")
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userInfo">
                        <ul class="sui-nav nav-tabs nav-large nav-primary ">
                            <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                            <li><a href="#two" data-toggle="tab">头像照片</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="one" class="tab-pane active">
                                <!-- <form id="form-msg" class="sui-form form-horizontal"> -->
                                <div id="form-msg" class="sui-form form-horizontal">
                                    <div class="control-group">
                                        <label for="inputName" class="control-label">昵称：</label>
                                        <div class="controls">
                                            <input type="text"  id="user_name" name="email" value="{{$info->user_name}}" placeholder="昵称">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputGender" class="control-label">性别：</label>
                                       
                                           
                                            <input type="radio" name="gender" id="sex" {{$info->sex==1?"checked":""}} value="1" checked>男&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="radio" name="gender" id="sex" {{$info->sex==2?"checked":""}} value="2">女
                                       
                                        
                                    </div>
                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">生日：</label>
                                        <div class="controls">
                                            <input type="text" value="{{$info->birth}}" id="birth">
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">所在地：</label>
                                        <div class="controls">
                                            <div data-toggle="distpicker" >
                                                <div class="form-group area">
                                                    <select class="form-control" id="province1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="city1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="district1"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label for="sanwei" class="control-label"></label>
                                        <div>
                                            <button type="submit" class="sui-btn btn-primary add">立即注册</button>
                                        </div>
                                    </div>
                                <!-- </form> -->
                                </div>
                            </div>
                            <style>
                                 .fileinput-button {
                                    position: relative;
                                    display: inline-block;
                                }

                                .fileinput-button input{
                                    position: absolute;
                                    right: 0px;
                                    top: 0px;
                                }
                            </style>
                           <div id="two" class="tab-pane">
                              <form action="{{url('user/user_file')}}" method="post" enctype="multipart/form-data">
                                <div class="new-photo">
                                    <p>当前头像：</p>
                                    <div class="upload">
                                        <img id="imgShow_WU_FILE_0" width="100" height="100" src="{{env('UPLOAD_URL')}}{{$info->img}}" alt="">
                                        <p><input type="file" style="color:red;float:left;" id="up_img_WU_FILE_0" name="img"/></p><br>
                                        <p><input type="submit" value="保存" class="bao" style=" border:none; color:white; height:30px; width:60px; background:#00ff00; margin-right:70px; float:left; "></p>
                                    </div>

                                </div>
                              </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 底部栏位 -->
    <!--页面底部-->

<!--页面底部END-->

<script>
    $(document).on("click",".add",function(){
        var user_name = $("#user_name").val();
        var sex = $("#sex:checked").val()
        var birth = $("#birth").val();
        var province1 = $("#province1").val();
        var city1 = $("#city1").val();
        var district1 = $("#district1").val();
        var url = "{{url('/user/user_add')}}";
        var data = {};
        data.user_name = user_name;
        data.sex = sex;
        data.birth = birth;
        data.province1 = province1;
        data.city1 = city1;
        data.district1 = district1;
        
        $.ajax({
            type:"post",
            data:data,
            dateType:"json",
            url:url,
            success:function(res) {
                if(res.success==false){
                    alert(res.message);
                }
                if(res.success==true){
                    alert(res.message);
                    window.location.reload()
                }
               
            }
        })
        
    })

    

</script>
 
<script>


</script>
    @include("index.layout.foot")