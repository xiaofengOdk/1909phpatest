@foreach($reg as $k=>$v)
			                          <tr admin_id="{{$v->admin_id}}">
			                           
				                          <td>{{$v->admin_id}}</td>
									      <td pub="admin_name" >
                                              <input type="text" value="{{$v->admin_name}}" class="updo" style="display: none;"/>
                                              <span class="upp">{{$v->admin_name}}</span>

                                          </td>
                                          <td>
		                                  <td class="text-center">

                                              <button type="button" class="btn bg-olive btn-xs  fu" data-toggle="modal" data-target="#roleModal" data-admin_id="{{$v->admin_id}}">赋予角色</button>
                                              <button type="button" class="btn bg-olive btn-xs fl" data-toggle="modal" data-target="#delModal" data-admin_id="{{$v->admin_id}}"  >删除</button>
		                                  </td>
			                          </tr>
									  @endforeach