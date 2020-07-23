@extends("admin.layout.public")
@section("content")

                    <div class="box-header with-border">
                        <h3 class="box-title">商品管理     
                       	</h3>
                    </div>

                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<a href="JavaScript:;" >商品管理</a> 
		                        </li>
		                        <li>
		                       		<a href="JavaScript:;" >展示</a>
		                        </li>
		                       
	                        </ol>

                        <!-- 数据表格 -->
                        <div class="table-box">
							
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="添加商品" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加商品</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-check"></i> 刷新</button>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		  <form>
                            	<input type="text"  class="btn btn-default" name="cate_name">
                            	<input type="submit"   value="商品查询" >
                           	
                            </form>
                        
							<!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">名称</th>									   
									      <th class="sorting">图片</th>									   
									      <th class="sorting">分类</th>									   
									      <th class="sorting">品牌</th>									   
									      <th class="sorting">操作</th>									   
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($goods_res as $k=>$v)
			                          <tr ids="{{$v->goods_id}}">
				                          <td>{{$v->goods_id}}</td>
									      <td goods_name="goods_name">
											  <span class="span_test">
												{{$v->goods_name}}
											</span>
											  <input class="chang" type="text" value="{{$v->goods_name}}" style="display:none">
										</td>									    
										  <td >
											  <span class="span_test"> 										 
											   <img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="150px" height="100px">
</span>
										  </td>
										 <td >
											  <span class="span_test"> {{$v->cate_name}}</span>
										  </td>
										 <td >
											  <span class="span_test"> {{$v->brand_name}}</span>
										  </td>
		                                  <td class="text-center">		                                     
		                                      <button type="button" class="btn bg-olive btn-xs" id="del" rid="{{$v->goods_id}}">删除</button> 		                                     
		                                 	  <!-- <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>                                            -->
		                                  </td>
			                          </tr>
									@endforeach
								  </tbody>
								  
							  </table>
							  			                  <!--数据列表/-->                      
						
                        </div>
                        <!-- 数据表格 /-->
                        
                        
                        
                        
                     </div>
                    <!-- /.box-body -->
              
                                
</body>
<script>
	$(document).on("click",".bb",function(){
		var cate_name = $("#cate_name").val()
		var pid=$("select[name='parent_id']").val()
		var data = {};
		 data.cate_name = cate_name;
		 data.pid = pid;
		 // console.log(data);
		 // return false;
		 var url = "{{url('/admin/cate_adds')}}";
		 $.ajax({
			 type:"post",
			 url:url,
			 data:data,
			 datetype:"json",
			 headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
			success:function(res){
				// console.log(res)
				if(res.success==false){
					alert(res.message);
				}
				if(res.success=="success"){
					alert(res.message);
						history.go(0);
				}
			}
		 })
		
	})
	$(document).on("click","#del",function(){
		var cate_del = $(this).attr("rid");
		var url = "{{url('/admin/goods_del')}}";
		var data = {};
		// console.log(cate_del)
		// return false
		data.cate_del = cate_del; 
		if(window.confirm("是否删除")){
			$.ajax({
				type:"post",
				url:url,
				data:data,
				datetype:"json",
				headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
				success:function(res){
					// console.log(res)
					// if(res.success==true){
						alert(res.message);
						history.go(0);
					// }
				}
			})
		}
	})
	$(document).ready(function(){
		$(".span_test").click(function(){
            var _this = $(this);
            _this.hide();
            _this.next("input").show();
         $(".chang").blur(function(){
                var _this = $(this);
                var zi = _this.val();
                var goods_id = _this.parents("tr").attr("ids");
                var goods_name = _this.parent("td").attr("goods_name");
                var data = {};
                data.goods_name = goods_name;
                data.goods_id = goods_id;
                data.zi = zi;
                console.log(data)
                // return false
               var url = "{{url('/admin/goods_ji')}}";
                $.ajax({
                    type:"get",
                    data:data,
                    url:url,
                    dataType:"json",
                    success:function(res){
						// console.log(res)
					    if(res.success==true){
						// alert(res.message);
						history.go(0);
						}
                    }
            })
            })
        })
	})
	// $(document).on("click",".pagination a",function(){
	// 	var url = $(this).attr("href");
	// 	$.get(url,function(result){
	// 		$("tbody").html(result);
	// 	})
	// 	return false;
	// })
</script>
@endsection