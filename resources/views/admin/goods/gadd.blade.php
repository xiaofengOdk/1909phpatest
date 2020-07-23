@extends("admin.layout.public")
@section("content")
<body class="hold-transition skin-red sidebar-mini" >
            <!-- 正文区域 -->
            <section class="content">
            <!-- <form method='post' action='/admin/gdo' enctype="multipart/form-data"> -->
                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">                       		
                            <li class="active">
                                <a href="#home" data-toggle="tab">商品基本信息</a>                                                        
                            </li>   
                        
                            <li >
                                <a href="#spec" data-toggle="tab" >规格</a>                                                        
                            </li>                       
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                          
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                  
								   <div class="col-md-2 title">商品分类</div>
		                          
		                           	  <div class="col-md-10 data">
		                           	  	<table>
		                           	  		<tr>
		                           	  			<td>
		                           	  				<select class="form-control" >														
		                           	  				</select>
		                              			</td>
		                              			<td>
		                           	  				<select class="form-control select-sm" ></select>
		                              			</td>
		                              			<td>
		                           	  				<select class="form-control select-sm" ></select>
		                              			</td>
		                              			<td>
		                           	  				模板ID:19
		                              			</td>
		                           	  		</tr>
		                           	  	</table>
		                              	
		                              </div>	                              
		                          	  
									
		                           <div class="col-md-2 title">商品名称</div>
		                           <div class="col-md-10 data">
		                               <input type="checked" class="form-control"    placeholder="商品名称" name="goods_name" >
		                           </div>
		                           
		                           <div class="col-md-2 title">品牌</div>
		                           <div class="col-md-10 data">
		                              <select class="form-control" name="brand_id" >
                                         <option>请选择</option>
                                         @foreach($Bdata as $k=>$v)
                                            <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                         @endforeach
                                      </select>
		                           </div>
		
								
		                           
		                           <div class="col-md-2 title">商品价格</div>
		                           <div class="col-md-10 data">
		                           	   <div class="input-group">
			                          	   <span class="input-group-addon">¥</span>
			                               <input type="text" class="form-control" name="goods_price"  placeholder="价格" value="">
		                           	   </div>
		                           </div>
		                           
		                           <div class="col-md-2 title editer">商品介绍</div>
                                   <div class="col-md-10 data editer">
                                       <textarea class="goods_dese" style="width:800px;height:400px; border:1px solid #fff" ></textarea>
                                   </div>
		                           
		                           <div class="col-md-2 title">商品数量</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control"   placeholder="商品数量" name="goods_stor" >
		                           </div>
		                           
                                   <div class="col-md-2 title">商品图片</div>
		                           <div  class="col-md-10 data">
		                               
                                   <input type="file" name="goods_img" id ="file_upload">
                                    <div class="baTop">
                            
                                    </div>
		                           </div>  

                                   <div class="col-md-2 title">是否展示</div>
		                           <div class="col-md-10 data">
		                               
                                   <input type="radio" checked  name="is_show" value='1'>是
                                   <input type="radio"  name="is_show" value='2'>否
		                           </div>  

                                   <div class="col-md-2 title">是否热卖</div>
		                           <div class="col-md-10 data">
		                               
                                   <input type="radio" checked name="is_hot" value='1'>是
                                   <input type="radio"  name="is_hot" value='2'>否
		                           </div>    

                                  <div class="col-md-2 title">是否上架</div>
		                           <div class="col-md-10 data">
		                               
                                   <input type="radio" checked name="is_up" value='1'>是
                                   <input type="radio"   name="is_up" value='2'>否
		                           </div>  

                                   <div class="col-md-2 title">是否新品</div>
		                           <div class="col-md-10 data">
		                               
                                   <input type="radio" checked name="is_new" value='1'>是
                                   <input type="radio"  name="is_new" value='2'>否
		                           </div>   
                                </div>
                            </div>
                            
                        
                           
                   

                            <!--规格-->
                            <div class="tab-pane" id="spec">
                            	
                            	<p>
                            	
                            	<div>
                            	
	                                <div class="row data-type">
	                                
		                                <!-- <div>
                                            @foreach($Adata as $k=>$v)
                                           
			                                <div class="col-md-2 title Aname">{{$v->attr_name}}</div>
                                            <input type='hidden' name="attr_id" value="{{$v->attr_id}}"/>
					                        <div class="col-md-10 data">
					                            @foreach($Vdata as $key=>$val)
                                                 @if($val->attr_id==$v->attr_id)
					                            <span>
					                            	<input  name="attr_val" type="checkbox"  value="{{$val->id}}" >{{$val->attrval_name}}					                            				                            	
					                            </span>
                                                @endif
                                                @endforeach  	
																							
					                            	
					                        </div>
                                            @endforeach
		                                </div>   
										   -->
                                        <div>
                                            <div class="col-md-10 data">
                                            <select name="attr_id" class="col-md-2 title Aname">
                                            @foreach($Adata as $k=>$v)
                                                <option value="{{$v->attr_id}}">{{$v->attr_name}}</option>
                                            @endforeach
                                             </select>
			                                <!-- <div class="col-md-2 title Aname">{{$v->attr_name}}</div> -->
                                          
                                            <!-- <input type='hidden' name="attr_id" value="{{$v->attr_id}}"/> -->
					                            <!-- <span> </span><br> -->
                                            <select name="attr_val"  class="col-md-2 title Aname">
                                            @foreach($Vdata as $key=>$val)
                                                <option value="{{$val->id}}">{{$val->attrval_name}}</option>
                                            @endforeach
                                             </select>
                                               
					                        </div>
                                        
		                                </div>   
										                                                  
	                                </div>
	
	                                
	                                <div class="row data-type">
	                                	 <table class="table table-bordered table-striped table-hover dataTable">
						                    <thead>
						                        <tr>					                         
												    <th class="sorting">价格</th>
												    <th class="sorting">库存</th>									   
											    </tr>
								            </thead>
						                    <tbody>
						                      <tr>					                           
										          
										            <td>
										           		<input class="form-control"  placeholder="价格" name="goods_price">
										            </td>
										            <td>
										            	<input class="form-control" placeholder="库存数量" name="goods_store">
										            </td>
										           
						                      </tr>
											 
											
											  
						                    </tbody>
									 	</table>
								
	                                </div>
	                                
	                            </div>
                            </div>
                            
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
					
                    </div>
                 	
                 	
                 	
                 	
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <!-- <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save attr_info" ></i>保存</button> -->
				      <button class="btn btn-primary attr_info" ><i class="fa fa-save " ></i>保存</button>
				      <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
				  </div>
                <!-- </form>	  -->
            </section>
            
            
<!-- 上传窗口 -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">上传商品图片</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped">
		      	<tr>
		      		<td>颜色</td>
		      		<td><input  class="form-control" placeholder="颜色" ng-model="image_entity.color">  </td>
		      	</tr>			    
		      	<tr>
		      		<td>商品图片</td>
		      		<td>
						<table>
							<tr>
								<td>

					            </td>
								<td> 
									<img   width="200px" height="200px">
								</td>
							</tr>						
						</table>
		      		</td>
		      	</tr>		      	
			 </table>				
			
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success" ng-click="add_image_entity()" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>




            <!-- 富文本编辑器 -->
	<link rel="stylesheet" href="/static/admin/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/static/admin/plugins/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/static/admin/plugins/kindeditor/lang/zh_CN.js"></script> 
    <link rel="stylesheet" href="/static/chajian/uploadify.css">
<script src="/static/chajian/jquery.uploadify.js"></script>
            <!-- 正文区域 /-->
<script type="text/javascript">

	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});
$(document).on("click",".attr_info",function(){
    var attr_id=$("select[name='attr_id']").val()
    var attr_val=$("select[name='attr_val']").val()
    var brand_id=$("select[name='brand_id']").val()

    // console.log(attr_id)
    // console.log(attr_val)
    // return false
    var sku=attr_id+":"+attr_val;
    // console.log(sku);
    // return false
    var goods_name=$("input[name='goods_name']").val()
    var goods_dese=$(".goods_dese").val()
    var goods_price=$("input[name='goods_price']").val()
    var goods_store=$("input[name='goods_store']").val()
    var baTop=$(".baTop").children('img').attr('src')
//    console.log(goods_store);
    // return false
    var url='/admin/gdo';
          $.ajax({
                     type:'post',
                     url:url,
                     data:{'sku':sku,brand_id:brand_id,goods_name:goods_name,goods_dese:goods_dese,goods_price:goods_price,goods_store:goods_store},
                     dataType:'json',
                     success:function(reg){
                         //console.log(reg);
                        if(reg.code=='000000'){
                             alert(reg.message);
                              window.location.reload();
                            // return false;

                         }
                        
                       
                     }
                 })

})
</script>    
<script>
    $(function() {
        $('#file_upload').uploadify({
            swf      : '/static/chajian/uploadify.swf/', 
            uploader : 'gdo',
            buttonText : "上传",
	onUploadSuccess:function(msg,newFilePath,info){
				// var video_str='<img src="'+newFilePath+'" controls="controls">';
				// $(".baTop").append(video_str);
				console.log(newFilePath)
			}
        });
    });
</script>
</body>

@endsection