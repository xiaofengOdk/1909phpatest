@foreach($res as $k=>$v)
			                          <tr ids="{{$v->right_id}}">
			                              <td></td>			                              
				                          <td>{{$v->right_id}}</td>
									      <td right_name="right_name">
											 
											  <span class="span_test"> {{$v->right_name}}</span>
											  <input class="chang" type="text" value="{{$v->right_name}}" style="display:none">
											</td>									    
										  <td  right_name="right_url">
											  <span class="span_test"> {{$v->right_url}}</span>
											  <input class="chang" type="text" value="{{$v->right_url}}" style="display:none">
										  </td>
										  <td right_name="right_desc">
											  <span class="span_test"> {{$v->right_desc}}</span>
											  <input class="chang" type="text" value="{{$v->right_desc}}" style="display:none">
											</td>									      
		                                  <td class="text-center">		                                     
		                                      <button type="button" class="btn bg-olive btn-xs" id="del" rid="{{$v->right_id}}">删除</button> 		                                     
		                                 	  <!-- <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>                                            -->
		                                  </td>
                                      </tr>
                                      
                                    @endforeach
                                    
                                    <p>{{$res->links()}}</p>