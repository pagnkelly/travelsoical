<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body id="local-detail">
	<?php include '/../header.php'; ?>
	<div class="pad mar">
		<div class="container">
			<div class="ui large breadcrumb">
			  <a href ="Local" class="section">当地人</a>
			  <i class="right chevron icon divider"></i>
			  <div class="active section"><?php echo $data -> local_name;?></div>
			</div>
			<div class="ui section divider"></div>

			<div class="ui grid">
				<div class="five wide column">
					<img class="ui large image " src="img/local/local-person-1.jpg" alt="">
				</div>
				<div class="eleven wide column">
					<div class="content">
						<a class="header"> <?php echo $data -> local_name;?> </a>
						<div class="description">
					      <?php echo $data -> local_des;?>
					    </div>
					    <div class="ui section divider"></div>
					    <div class="ui two columns grid">
					    	<div class="column">
					    		<div class="description">
									<p>地 区： <?php echo $data -> local_city;?></p>
									<p>性 别： <?php echo $data -> gender;?></p>
									<p>从业年限： <?php echo $data -> year;?>年</p>
									<p>擅长语言： <?php echo $data -> language;?></p>
							    </div>
					    	</div>

					    	<div class="column">
					    		<div class="item price">￥<span id="per-price"><?php echo $data -> price;?></span>/日</div>
					    		<div class="ui teal button right floated" id="buy">立即订购</div>
					    	</div>
					    </div>
					    
					</div>
				</div>
			</div>
			<div class="ui section divider"></div>
			 <div class="header" style="font-size:20px;">服务说明</div>
			<div class="ui divided items">
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green list layout"></i>
			    </div>
			    <div class="top aligned content">
			    	<div class="header">服务描述</div>
			      <div class="description"><?php echo $data -> service_des;?>
				  </div>
			    </div>
			  </div>
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green yen"></i>
			    </div>
			    <div class="top aligned content">
			      <div class="header">价格描述</div>
			      <div class="description"><?php echo $data -> price_des;?></div>
			    </div>
			  </div>
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green announcement "></i>
			    </div>
			    <div class="top aligned content">
			     <div class="header">预定须知</div>
			     <div class="description"><?php echo $data -> book_info;?></div>
			    </div>
			  </div>
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green building"></i>
			    </div>
			    <div class="top aligned content">
			     <div class="header">店铺信息</div>
			     <div class="description"><?php echo $data -> store_info;?></div>
			    </div>
			  </div>
			</div>
		</div>
	</div>




	<div class="ui modal">
	  	<i class="close icon"></i>
		<div class="header">
		   订单详情
		</div>
	  	<div class="content clearfix">
	  		
			<div class="description" style="float:right;">
				<div class="two fields">
					<div class="field">
					  <label>起始时间</label>
					  <div class="ui category search">
					<div class="ui left icon input">
					  <i class="wait icon"></i>
					  <input class="prompt" type="text" placeholder="起始时间" autocomplete="off" id="indatepicker">
					</div>
					<div class="results"></div>
					  </div>
					</div>
					<div class="field">
					    <label>结束时间</label>
					    <div class="ui local search">
							<div class="ui left icon input">
					 		 <i class="wait icon"></i>
					 		 <input class="prompt" type="text" placeholder="结束时间" autocomplete="off" id="outdatepicker">
						</div>
							<div class="results"></div>
						</div>
					</div>
				</div>
		    </div>
		    <div class="image" style="float:left">
		     	<img src="img/hotel/hotel-tuijian-1.jpg" alt="" class="ui small image" id="photo">
		    </div>
	   		<div class="fd">
	   			<p class="fd-type">导游： <?php echo $data -> local_name;?></p>
	  			<p class="fd-type">地区： <?php echo $data -> local_city;?></p>
	  			<p class="fd-price">单价：￥<?php echo $data -> price;?></p>
	  		</div>
	  		<div class="fd" style="margin-left: 20px;">
	   			<p class="fd-type">性别： <?php echo $data -> gender;?></p>
	  			<p class="fd-type">从业年限： <?php echo $data -> year;?>年</p>
	  			<p class="fd-price">擅长语言： <?php echo $data -> language;?></p>
	  		</div>
		</div>
		<div class="ui section divider"></div>
		<div class="total-price">
			总价：￥<span>0</span>
		</div>
	  	<div class="actions">
		    <div class="ui button" id="order-cancel">取消</div>
		    <div class="ui button" id="order-sure">确定</div>
	  	</div>
	</div>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/pikaday.js"></script>
	<script>
	$(function(){
		var inDatePicker = new Pikaday(
	    {
	        field: document.getElementById('indatepicker'),
	        firstDay: 1,
	        minDate: new Date(),
	        maxDate: new Date('2020-12-31'),
	        yearRange: [2000, 2020],
	        onSelect: function(){
	        	outDatePicker.setMinDate(new Date(inDatePicker.toString()));
	        	if(outDatePicker.toString()){
	        		selectHandel();
	        	}
	        }
	    });

		var outDatePicker = new Pikaday(
	    {
	        field: document.getElementById('outdatepicker'),
	        firstDay: 1,
	        minDate: new Date(),
	        maxDate: new Date('2020-12-31'),
	        yearRange: [2000, 2020],
	        onSelect: function(){
	        	inDatePicker.setMaxDate(new Date(outDatePicker.toString()));
	        	if(inDatePicker.toString()){
	        		selectHandel();
	        	}
	        }
	    });

		var time,days,price;
		function selectHandel() {
	    	
	    	time = new Date(outDatePicker.toString()).getTime()-new Date(inDatePicker.toString()).getTime()
	        days = parseInt(time/(1000*60*60*24));
	        price = parseInt($('#per-price').html());
	        var $totalPrice = $('.total-price span');
	        $totalPrice.html(price*days);
			
	    }

		$('#order-sure').on('click',function(){
			var  local_id =  <?php echo $data -> local_id;?>;
			if(days!=0){
				$.post('local/order',{totalPrice: price*days , in_time: inDatePicker.toString() , out_time: outDatePicker.toString(),local_id: local_id,user_id: user_id },function(res){
					console.log(res);
					if(res == 'true' ) {
						alert('请到我的订单中查看');
						$('.ui.modal').modal('hide');
					}
				});
			}else{
				alert('选择入住天数需大于1');
			}
		});
		$('.ui.rating').rating();
		$('.ui.rating').rating({
		    clearable: false,
		    interactive: false
		});

		$('#star').rating({
		    clearable: true,
		    interactive: true,
		    onRate: function(value){
		    	console.log(value);
		    }
		});

		$('.menu .item').tab({
		});
	    var user_id; 
		$('#buy').on('click',function(){
			$('.ui.modal').modal('show');
			user_id =<?php if($user) {echo $user -> user_id;}else{echo -1;}?>;
			if(user_id == -1){
				alert("请登录");
				var loHref = location.pathname+location.search;
				location.href = 'login?last='+loHref;
			}else{

			}
		});
		$('#order-cancel').on('click',function(){
			$('.ui.modal').modal('hide');
		});

	});
	
	</script>
</body>
</html>