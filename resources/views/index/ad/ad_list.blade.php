@extends("index.layout.public")
@section("content")
@include("index.layout.top")
<div style="margin-top:20px;">
      <p style="color:#000; font-size:13px; padding-left:15px;">艾蒂妲快报 》》》<b style="color:#b1191a; font-size:12px;">{{$reg->g_name}}</b></p>
      <div style="border:1px solid #ccc; width:1200px; height:450px; background:#fff;margin:0 auto;">
          <h2 style="text-align:center; margin-top:30px;">{{$reg->g_name}}</h2>
         <div align="center"> <p style="text-align:left; margin-top:20px; width:600px;  text-indent:2em;">{{$reg->g_desc}}</p></div>
        
        
     
   


 
		
		</div>
        </div>
        </div>
@include("index.layout.foot")