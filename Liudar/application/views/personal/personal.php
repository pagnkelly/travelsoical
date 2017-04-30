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
								<div class="ui button primary">全部</div>
								<div class="ui button">当地人订单</div>
								<div class="ui button">酒店订单</div>
								<div class="ui divided items">
								  	<div class="order-item clearfix">
								  		<div class="item-header">
								  			订单号： 131231231231 预定时间： 2015-07-21 11：02
								  		</div>
								  		<div class="item-content">
								  			<div class="hotel-img">
								  				<div class="ui small image">
										      		<img src="img/hotel/hotel-tuijian-1.jpg">
										    	</div>
								  			</div>
									    	<div class="order-des">
									    		<div class="header">香港九龙诺夫特酒店（sdsadsadsda）</div>
									    		<div class="time">
									    		住：2015-08-17 离： 2015-08-18
									    		</div>
									   		</div>
									    	<div class="acount-price">￥231</div>
									    	<div class="operation">
										    	<div class="ui buttons">
													<div class="ui button">取消订单</div>
													<div class="or"></div>
													<div class="ui positive button">立即购买</div>
												</div>
									   		</div>
								  		</div>
									</div>
									<div class="order-item clearfix">
								  		<div class="item-header">
								  			订单号： 131231231231 预定时间： 2015-07-21 11：02
								  		</div>
								  		<div class="item-content">
								  			<div class="hotel-img">
								  				<div class="ui small image">
										      		<img src="img/hotel/hotel-tuijian-2.jpg">
										    	</div>
								  			</div>
									    	<div class="order-des">
									    		<div class="header">香港九龙诺夫特酒店（sdsadsadsda）</div>
									    		<div class="time">
									    		住：2015-08-17 离： 2015-08-18
									    		</div>
									   		</div>
									    	<div class="acount-price">￥231</div>
									    	<div class="operation">
										    	<div class="ui buttons">
													<div class="ui button">取消订单</div>
													<div class="or"></div>
													<div class="ui positive button">立即购买</div>
												</div>
									   		</div>
								  		</div>
									</div>
									<div class="order-item clearfix">
								  		<div class="item-header">
								  			订单号： 131231231231 预定时间： 2015-07-21 11：02
								  		</div>
								  		<div class="item-content">
								  			<div class="hotel-img">
								  				<div class="ui small image">
										      		<img src="img/hotel/hotel-tuijian-3.jpg">
										    	</div>
								  			</div>
									    	<div class="order-des">
									    		<div class="header">香港九龙诺夫特酒店（sdsadsadsda）</div>
									    		<div class="time">
									    		住：2015-08-17 离： 2015-08-18
									    		</div>
									   		</div>
									    	<div class="acount-price">￥231</div>
									    	<div class="operation">
										    	<div class="ui buttons">
													<div class="ui button">取消订单</div>
													<div class="or"></div>
													<div class="ui positive button">立即购买</div>
												</div>
									   		</div>
								  		</div>
									</div>
								</div>
		  					</div>
							<div class="ui segment hidden" id="my-strategy">

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
								 	<tbody>
								    	<tr>
								      		<td>大理之行</td>
								      		<td>2013年9月14日</td>
								     		<td>云南，贵州</td>
								      		<td>大理，丽江，西双版纳</td>
								      		<td><div class="ui primary button">详细内容>></div><div class="button ui">删除</div></td>
								   		</tr>
								   		<tr>
								      		<td>大理之行</td>
								      		<td>2013年9月14日</td>
								     		<td>云南，贵州</td>
								      		<td>大理，丽江，西双版纳</td>
								      		<td><div class="ui primary button">详细内容>></div><div class="button ui">删除</div></td>
								    	</tr>
								    	<tr>
								      		<td>大理之行</td>
								      		<td>2013年9月14日</td>
								     		<td>云南，贵州</td>
								      		<td>大理，丽江，西双版纳</td>
								      		<td><div class="ui primary button">详细内容>></div><div class="button ui">删除</div></td>
								    	</tr>
								  	</tbody>
								</table>
							</div>
							<div class="ui segment hidden" id="my-care">
								<div class="ui divided items">
  									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-1.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
      										<div class="ui right floated button">
      											<i class="icon heart"></i>
										         取消关注  
										    </div>
    									</div>
  									</div>
									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-1.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
      										<div class="ui right floated button">
      											<i class="icon heart"></i>
										         取消关注  
										    </div>
    									</div>
  									</div>
									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-2.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
      										<div class="ui right floated button">
      											<i class="icon heart"></i>
										         取消关注  
										    </div>
    									</div>
  									</div>
									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-3.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
      										<div class="ui right floated button">
      											<i class="icon heart"></i>
										         取消关注  
										    </div>
    									</div>
  									</div>

								</div>
							</div>
							<div class="ui segment hidden" id="my-fans">
								<div class="ui divided items">
  									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-1.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
    									</div>
  									</div>
									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-1.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
    									</div>
  									</div>
									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-2.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
      										</div>
    									</div>
  									</div>
									<div class="item">
   									 	<div class="circle-photo" >
     								 		<img src="img/local/local-person-3.jpg"style="width:100%;height:100%;">
    									</div>
    									<div class="middle aligned content" style="margin-left:64px;">
      										<div class="header">
									        name
									    	</div>
      										<div class="description">
        									<p>简介：的撒旦撒旦撒安第斯山</p>
        									<p>个人签名：的撒旦撒</p>
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
			</div>

		</div>
	</div>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script>
	$(function(){
			var photoSrc;

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
			$('#order-btn').on('click',function(){
				$('#order-list').removeClass('hidden');
				$('#order-list').siblings().addClass('hidden');

			});
			$('#strategy-btn').on('click',function(){
				$('#my-strategy').removeClass('hidden');
				$('#my-strategy').siblings().addClass('hidden');

			});
			$('#care-btn').on('click',function(){
				$('#my-care').removeClass('hidden');
				$('#my-care').siblings().addClass('hidden');

			});
			$('#fans-btn').on('click',function(){
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