<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/static/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="/index/login" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal">
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的用户名" class="input-xfat input-xlarge" name="user_name">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" placeholder="设置登录密码" class="input-xfat input-xlarge" name="user_pwd">
						</div>
					</div>
					
					
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的手机号" class="input-xfat input-xlarge" name="user_tel">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls">
							<input type="text" placeholder="短信验证码" class="input-xfat input-xlarge" name="code">  
                            <input type="button" value="获取短信验证码" class="input-xfat input-xlarge verify">
						</div>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<a class="sui-btn btn-block btn-xlarge btn-danger btn"  target="_blank">完成注册</a>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


<script type="text/javascript" src="/static/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/static/index/js/pages/register.js"></script>
</body>

</html>
<script>
    //获取验证码
    $(document).ready(function(){
          $(".verify").click(function(){
              var user_tel=$("input[name='user_tel']").val();
              var treg=/^1[34578]\d{9}$/;
              var url='/index/verify'; 
              if(user_tel==''){
                    alert('手机号码不能为空');
                    return false;
              }else if(!treg.test(user_tel)){
                    alert('请输入正确的手机格式');
                    return false;
              }else{
                   c
              }
          })

          $(".btn").click(function(){
                 var data={};
                data.user_tel=$("input[name='user_tel']").val();
                data.user_name=$("input[name='user_name']").val();
                data.user_pwd=$("input[name='user_pwd']").val();
                data.code=$("input[name='code']").val();
                var url='/index/regdo';
               if(data.user_tel==''|| data.user_name==''||data.user_pwd==''||data.code==''){
                alert('不能为空');
               }else{
                $.ajax({
                       type:'post',
                       data:data,
                       url:url,
                       dataType:'json',
                       success:function(reg){
                        if(reg.code=='00001'){
                             alert(reg.message);
                         }
                         if(reg.code=='00002'){
                             alert(reg.message);
                         }
                         if(reg.code=='00003'){
                             alert(reg.message);
                         }
                         if(reg.code=='00004'){
                             alert(reg.message);
                             location.href='/index/login';
                         }
                         if(reg.code=='00005'){
                             alert(reg.message);
                         }
                       }
                   })
               }
              
          })
    })
</script>