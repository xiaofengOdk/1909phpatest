@extends("index.layout.public")
@section("content")
@include("index.layout.top")
<div style="margin-top:20px;">
      <p style="color:#000; font-size:15px;">品优购快报><a style="color:red; font-size:12px;">{{$reg->g_name}}</a></p>
      <div style="border:1px solid #ccc; width:1200px; height:450px; background:#fff;margin:0 auto;">
          <h2 style="text-align:center;">{{$reg->g_name}}</h2>
         <div align="center"> <p style="text-align:left; margin-top:20px; width:600px;  text-indent:2em;">{{$reg->g_desc}}</p></div>
        
        
     
   


 <div class="like" style="margin-top:25px;" align="center">
			
				<div class="like-list" >
					<ul class="yui3-g" >
                       @foreach($gInfo as $k=>$v)
						<li class="yui3-u-1-6" style="margin-left:125px;">
							<div class="list-wrap">
								<div class="p-img">
									<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" />
								</div>
								<div class="attr">
									<em>{{$v->goods_name}}</em>
								</div>
								<div class="price"  style="margin-top:20px;">
									<strong>
											<em>¥</em>
											<i>{{$v->goods_price}}</i>
										</strong>
								</div>
                                <div class="commit">
                                <a href="/index/goods_desc/{{$v->goods_id}}" class="sui-btn btn-bordered btn-danger">立即购买</a>
                            </div>
							</div>
						</li>
						@endforeach
					
						
						
					</ul>
				</div>
			</div>
		</div>
        </div>
        </div>
@include("index.layout.foot")