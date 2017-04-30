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
			  <div class="active section">xxxxx韦德</div>
			</div>
			<div class="ui section divider"></div>

			<div class="ui grid">
				<div class="five wide column">
					<img class="ui large image " src="img/local/local-person-1.jpg" alt="">
				</div>
				<div class="eleven wide column">
					<div class="content">
						<a class="header">【浅川国际】日本导游-小兔</a>
						<div class="description">
					      日本徒步导游 热情 周到 专业 带领客户领略不一样的日本风情
					    </div>
					    <div class="ui section divider"></div>
					    <div class="ui two columns grid">
					    	<div class="column">
					    		<div class="description">
									<p>地 区： 日本</p>
									<p>性 别： 女</p>
									<p>从业年限： 1年</p>
									<p>擅长语言： 普通话、英语、日语</p>
							    </div>
					    	</div>

					    	<div class="column">
					    		<div class="item price">￥212/日</div>
					    		<div class="ui teal button right floated">立即订购</div>
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
			      <div class="description">大家好！我是导游小兔！

					大阪，京都，名古屋，北海道，东京，冲绳...

					旅行，电影，日剧，戏剧，展览，美妆，护肤，穿搭，发呆，

					好玩的好吃的好不容易我都懂一点，能给你的不是攻略，要推荐的也不是免税店，

					是让每个人都活成那个最特别的自己。

					谁说去旅游玩的态度不能认真？

					我们都是有故事的人，经历了太多的悲喜，

					才遇到现在的自己。

					请咨询微信wenly201515

				</div>
			    </div>
			  </div>
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green yen"></i>
			    </div>
			    <div class="top aligned content">
			      <div class="header">价格描述</div>
			      <div class="description">导游报价800元/天，一天8小时，路费由客人承担。请知悉。</div>
			    </div>
			  </div>
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green announcement "></i>
			    </div>
			    <div class="top aligned content">
			     <div class="header">预定须知</div>
			     <div class="description">可以为您指定导游，请至少提前1天预订。</div>
			    </div>
			  </div>
			  <div class="item">
			    <div class="ui tiny image">
			      <i class="icon huge green building"></i>
			    </div>
			    <div class="top aligned content">
			     <div class="header">店铺信息</div>
			     <div class="description">店铺名称：浅川国际 
供应商名称：湖北中旅商务国旅旅行社有限责任公司 查看营业执照</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script>
	$(function(){
		

	
		
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

	});
	
	</script>
</body>
</html>