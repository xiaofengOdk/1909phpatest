@extends("index.layout.public")
@include("index.layout.top")
@section("content")
<body>
   
   <div class="page-right">
   	
     <div class="news-txt ny mg-t-b">
     <form action="/user/answer_add" method="post">
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="liuyantab">
  <form action="" method="post" name="new" id="new"></form><tbody>
  <tr>
    <td  width="569" height="38" bgcolor="#F4F4F4"  align="center" style="font-size:25px;" class="kkkk1">欢迎留言</td>
    
  </tr>
  <tr>
    <td height="66" class="kkkk2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tbody>
      <tr>
        <td width="11%" height="34" align="center">姓　名：</td>
        <td colspan="2">
		<input name="answer_name" type="text" class="input1" size="52" maxlength="20" style="width:95%; border:#999999 dashed 1px; color:#666666; padding:5px; outline:none;" onfocus="this.select()" onblur="if (this.value =='') this.value='请输入您的姓名，不填写为匿名发表'" onclick="if (this.value=='请输入您的姓名，不填写为匿名发表') this.value=''" value="请输入您的姓名，不填写为匿名发表">
		</td>
      </tr>
      <tr>
        <td align="center">留　言：</td>
        <td colspan="2"><textarea name="answer_content" cols="50" rows="7" style="width:95%; border:#999999 dashed 1px; color: #5C5C5C; line-height:20px; padding:5px; outline:none;"></textarea></td>
      </tr>
     

      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><span class="font8">
          <div align="center" style="margin:20px 0; margin-left:-1270px;" >
          <input type="hidden" name="action_e" value="Add_New">
          <input type="submit" name="Submit2" value="发表留言"></div></span></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody>
 </table>
 </form>

    </div>
   	 
   </div>
   <div class="clearfix"></div>
</div>
<!--展示留言-->
<div class="page-right">
   	
       <div class="news-txt ny mg-t-b">
       <form action="/user/answer_add" method="post">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="liuyantab">
    <form action="" method="post" name="new" id="new"></form><tbody>
    <tr>
      <td  width="569" height="38" align="center"  style="border:1px dashed #000; font-size:25px;" class="kkkk1">
           留言展示
      </td>
      
    </tr>
    <tr>
      <td height="66" class="kkkk2">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
        <tbody>
         @foreach($reg as $k=>$v)
        <tr>
          <td width="11%" height="34" align="center">姓　名：</td>
           @if($v->answer_name=='请输入您的姓名，不填写为匿名发表')
             <td colspan="2">
               匿名
             </td>
          @else
          <td colspan="2">
       
               {{$v->answer_name}}
          </td>
          @endif
        </tr>

        <tr>
            <td align="center">留　言：</td>
            <td colspan="2">
            <textarea name="answer_content" cols="50" rows="7" style="width:95%; border:#999999 dashed 1px; color: #5C5C5C; line-height:20px; padding:5px; outline:none;">
                 {{$v->answer_content}}
            </textarea>
            </td>
         </tr>
         @endforeach
         
        
     

      </tbody></table></td>
    </tr>
  </tbody>
   </table>
   </form>
  
      </div>
          
     </div>
     <div class="clearfix"></div>
  </div>
@include('index.layout.foot');


</body>
</html>
