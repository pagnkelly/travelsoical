<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body id="personal">
	<?php include '/../header.php'; ?>
	<div class="pad mar" style="height:100%;">
		<div class="container" style="height:100%;">
			<div class="ui large breadcrumb">
			  <a class="section">个人中心</a>
			  <i class="right chevron icon divider"></i>
			  <div class="active section"><?php echo $userInfo-> user_name;?></div>
			</div>
			<div class="ui section divider"></div>

			<div class="ui bottom attached segment pushable">
			  <div class="ui visible inverted left vertical sidebar menu">
				    <a class="item" id="person-btn">
				      <i class="home icon"></i>
				      个人信息
				    </a>
				    <a class="item" id="order-btn">
				      <i class="smile icon"></i>
				      我的订单
				    </a>
				    <a class="item" id="strategy-btn">
				      <i class="block layout icon"></i>
				      我的攻略
				    </a>
				    <a class="item" id="care-btn">
				      <i class="calendar icon"></i>
				      我的关注
				    </a>
				    <a class="item" id="fans-btn">
				      <i class="calendar icon"></i>
				      我的粉丝
				    </a>
			  </div>
			  <div class="pusher">
			    	<div class="ui basic segment">
			      		<div id="main-content" style="width:780px;">
						    <div class="ui form segment" id="person-info" >
									<div class="two fields">
										<div class="field">
											<label>头像</label>
											<div class="ui card">
												<div class="image dimmable">
													<div class="ui dimmer">
														<div class="content">
														    <div class="center">
														      	<div class="ui inverted button">更换头像</div>
														      	<div class="ui modal">
																  	<i class="close icon"></i>
																	<div class="header">
																	  更换头像
																	</div>
																  	<div class="content">
																		<div class="description" style="float:right">
																			<form action="personal/updatePersonalImg" method="post" enctype="multipart/form-data" id="form">
																				<input type="hidden" name="id" value=<?php echo $userInfo -> user_id;?>>
																	    		<input type="file" name="photo" id="file" />
																			</form>

																	    </div>
																	    <div class="image">
																	     	<img src=<?php echo $userInfo -> avator; ?> alt="" class="ui small image" id="photo">
																	    </div>
																   
																	</div>
																

																  	<div class="actions">
																	    <div class="ui button" id="changeIMGcancel">取消</div>
																	    <div class="ui button" id="IMGensure">确定</div>
																  	</div>
																</div>
											   				</div>
											  			</div>
													</div>
													<img src=<?php echo $userInfo -> avator; ?> id="main-photo">
											  	</div>
											</div>
									    </div>
									    <div class="field">
									      <label>姓名</label>
									      <input placeholder="Last Name" type="text" name="user_name" value=<?php echo $userInfo-> user_name;?>>
									    </div>
									</div>
									<div class="field">
									    <label>性别</label>
									    <div class="two fields">
										   		<div class="field">
											      <div class="ui radio checkbox">
											        <input type="radio" name="gender" value="0" <?php if(  $userInfo -> gender == '0' ){ ?> checked='checked'<?php } ?> >
											        <label>男</label>
											      </div>
											    </div>
											    <div class="field">
											      <div class="ui radio checkbox">
											        <input type="radio" name="gender" value="1" <?php if(  $userInfo -> gender == '1' ){ ?> checked='checked'<?php } ?> >
											        <label>女</label>
											      </div>
											    </div>
										</div>
									</div>
									<div class="field">
								    	<label>简介</label>
								    	<input placeholder="" type="text" name="introduction" value=<?php echo  $userInfo-> introduction;?> >
								 	</div>
								  	<div class="field">
								    	<label>个性签名</label>
								    	<input type="text" name="signature" value=<?php echo  $userInfo-> signature;?>  >
								 	</div>
									<div class="ui submit button" id="submit">提交</div>
							</div>
							<div class="ui segment hidden" id="order-list">
								<div class="ui button primary" id="hotel-order">酒店订单</div>
								<div class="ui button" id="local-order">当地人订单</div>
								<div class="ui divided items" id="tmpl-order">


								</div>
								<div class="ui pagination menu" id="page-order">
									
								</div>
		  					</div>
							<div class="ui segment hidden"  id="my-strategy">

								<table class="ui table">
								  	<thead>
								    	<tr>
								      		<th>题目</th>
								      		<th>时间</th>
								      		<th>途径</th>
								      		<th>行程</th>
								      		<th>查看详情</th>
								    	</tr>
								  	</thead>
								 	<tbody id="tmpl-strategy">
								    	
								   		
								  	</tbody>
								</table>
								<div class="ui pagination menu" id="page-strategy">
									
								</div>
							</div>
							<div class="ui segment hidden" id="my-care">
								<div class="ui divided items" id="tmpl-care">
  									
									

								</div>
								<div class="ui pagination menu" id="page-care">
								</div>
							</div>
							<div class="ui segment hidden" id="my-fans">
								<div class="ui divided items" id="tmpl-fans">
  									

								</div>
								<div class="ui pagination menu" id="page-fans">
									
								</div>
							</div>


						</div>
					</div>
			      </div>
			    </div>
			  </div>
			</div>

		</div>
	</div>


	<script type="text/template" id="tmpl-o">
		<div class="order-item clearfix">
	  		<div class="item-header">
	  			订单号： <%= id %> 预定时间： <%= book_time%>
	  		</div>
	  		<div class="item-content">
	  			<div class="hotel-img">
	  				<div class="ui small image">
			      		<img src="<%= img%>">
			    	</div>
	  			</div>
		    	<div class="order-des">
		    		<div class="header"><%= hotel_name%></div>
		    		<div class="time">
		    		住：<%= in_time%> 离： <%= out_time%>
		    		</div>
		   		</div>
		    	<div class="acount-price">￥<%= price%></div>
		    	<div class="operation">
			    	<div class="ui buttons">
						<div class="ui button">取消订单</div>
						<div class="or"></div>
						<div class="ui positive button">立即购买</div>
					</div>
		   		</div>
	  		</div>
		</div>
	</script>
	<script type="text/template" id="tmpl-l-o">
		<div class="order-item clearfix">
	  		<div class="item-header">
	  			订单号： <%= id %> 预定时间： <%= book_time%>
	  		</div>
	  		<div class="item-content">
	  			<div class="hotel-img">
	  				<div class="ui small image">
			      		<img src="<%= photo%>">
			    	</div>
	  			</div>
		    	<div class="order-des">
		    		<div class="header"><%= local_name%>       <span><%= local_city%></span></div>
		    		<div class="time">
		    		起：<%= in_time%> 终： <%= out_time%>
		    		</div>
		   		</div>
		    	<div class="acount-price">￥<%= price%></div>
		    	<div class="operation">
			    	<div class="ui buttons">
						<div class="ui button">取消订单</div>
						<div class="or"></div>
						<div class="ui positive button">立即购买</div>
					</div>
		   		</div>
	  		</div>
		</div>
	</script>
	
	<script type="text/template" id="tmpl-s">
		<tr>
      		<td><%= title%></td>
      		<td><%= time%></td>
     		<td><%= way%></td>
      		<td><%= trip%></td>
      		<td><a href="" class="item">详细内容>></a>  |  <a href="" class="item">删除</a></td>

   		</tr>
	</script>

	<script type="text/template" id="tmpl-c">
		<div class="item">
		 	<div class="circle-photo" >
		 		<img src="<%= avator%>" style="width:100%;height:100%;">
			</div>
			<div class="middle aligned content" style="margin-left:64px;">
				<div class="header">
		        <%= user_name%>
		    	</div>
				<div class="description">
					<p>简介：<%= introduction%></p>
					<p>个人签名：<%= signature%></p>
				</div>
				<div class="ui right floated button">
					<i class="icon heart"></i>
		         取消关注  
		   		 </div>
			</div>
		</div>

	</script>

	<script type="text/template" id="tmpl-f">
		<div class="item">
		 	<div class="circle-photo" >
		 		<img src="<%= avator%>" style="width:100%;height:100%;">
			</div>
			<div class="middle aligned content" style="margin-left:64px;">
				<div class="header">
		        <%= user_name%>
		    	</div>
				<div class="description">
					<p>简介：<%= introduction%></p>
					<p>个人签名：<%= signature%></p>
				</div>
			</div>
		</div>

	</script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/underscore.js"></script>
	<script>
	$(function(){
			var photoSrc;
			var user_id = <?php echo $user -> user_id;?>;
			$('.card .dimmer').dimmer({
			    on: 'hover'
			  });
			$('.ui.modal').modal();
			$('.card .dimmer').on('click',function(){
				$('.ui.modal').modal('show');
			});
			
			$('#changeIMGcancel').on('click',function(){
				$('.ui.modal').modal('hide');
			});

			$('#IMGensure').on('click',function(){
				$('.ui.modal').modal('hide');
				$('#main-photo')[0].src = photoSrc;
				$('#form').submit();
			});

			$('#file').change(function(e){
             var file = e.target.files[0]||e.dataTransfer.files[0];
             if(file){
                 var reader = new FileReader();
                 reader.readAsDataURL(file);
                 reader.onload=function(){
                        $('#photo')[0].src = this.result;
                        photoSrc = this.result;
                 }
                
            	}
             });

			$('#person-btn').on('click',function(){
				$('#person-info').removeClass('hidden');
				$('#person-info').siblings().addClass('hidden');
			});

			var cur_page = 1;
			function loadData(url,container,reqdata,pageContainer,tmpl){

				$.get(url,$.extend({page:1},reqdata), function (res) {
					console.log(res);
		           	$(container).html('');
		           	for(var i=0;i<res.data.length;i++){
		           		var item = res.data[i];
	                   	$(container).append(_.template($(tmpl).html())(item));
		           	}
					var total_page = Math.ceil(res.total_rows/5);
					$(pageContainer).html('');
	           		$(pageContainer).append('<a class="icon item prev"><i class="left arrow icon"></i></a>');
	           		for(var j=1;j<=total_page;j++){
	           			$(pageContainer).append('<a class="item page '+(j==1?'active':'')+'">'+j+'</a>');
	           		}
	           		$(pageContainer).append('<a class="icon item next"><i class="right arrow icon"></i></a>');

		           	$(pageContainer+' .page').each(function(index,item){
		           		var $this = $(this);
	 	           		$this.on('click',function(){
		           			$this.siblings().removeClass('active');
		           			$this.addClass('active');
		           			cur_page = index+1;
		           			$.get(url,$.extend({page:cur_page},reqdata),function(res){
	           					$(container).html('');
	           					for(var i=0;i<res.data.length;i++){
				           		var item = res.data[i];
			                   	$(container).append(_.template($(tmpl).html())(item));
					           	}
		           			},'json')
		           		});
		           	});

		           	$('.prev').on('click',function(){
		           		if(cur_page == 1){
		           			return ;
		           		}
		           		$(pageContainer+' .page').eq(cur_page-2).trigger('click');
		           	})

		           	$('.next').on('click',function(){
		           		if(cur_page == total_page){
		           			return ;
		           		}
		           		$(pageContainer+' .page').eq(cur_page).trigger('click');
		           	})
		        },'json');
			}


			$('#order-btn').on('click',function(){
				loadData('personal/orderList','#tmpl-order',{id:user_id},'#page-order','#tmpl-o');

				$('#order-list').removeClass('hidden');
				$('#order-list').siblings().addClass('hidden');

			});
			$('#hotel-order').on('click',function(){
				$('#hotel-order').addClass('primary');
				$('#local-order').removeClass('primary');
				loadData('personal/orderList','#tmpl-order',{id:user_id},'#page-order','#tmpl-o');
			});
			$('#local-order').on('click',function(){
				$('#local-order').addClass('primary');
				$('#hotel-order').removeClass('primary');
				loadData('personal/localOrderList','#tmpl-order',{id:user_id},'#page-order','#tmpl-l-o');
			});
			$('#strategy-btn').on('click',function(){
				loadData('personal/strategyList','#tmpl-strategy',{id:user_id},'#page-strategy','#tmpl-s');

				$('#my-strategy').removeClass('hidden');
				$('#my-strategy').siblings().addClass('hidden');

			});
			$('#care-btn').on('click',function(){
				loadData('personal/careList','#tmpl-care',{id:user_id},'#page-care','#tmpl-c');

				$('#my-care').removeClass('hidden');
				$('#my-care').siblings().addClass('hidden');

			});
			$('#fans-btn').on('click',function(){
				loadData('personal/fansList','#tmpl-fans',{id:user_id},'#page-fans','#tmpl-f');

				$('#my-fans').removeClass('hidden');
				$('#my-fans').siblings().addClass('hidden');

			});

			$('#submit').on('click',function(){
				var data ={
					user_name:$('input[name=user_name]').val(),
					user_id: $('input[name=id]').val(),
					gender: $('input[name=gender]:checked').val(),
					introduction: $('input[name=introduction]').val(),
					signature: $('input[name=signature]').val()
				};
				$.ajax({
					type: 'POST',
					url:'personal/updatePersonal',
					data: data,
					success: function(res){
						if(res=="true"){
							alert('保存成功');
						}
						if(res == "name"){
							alert("名字已存在");
						}
					}
				});
			});
	});
	
	</script>
</body>
</html>