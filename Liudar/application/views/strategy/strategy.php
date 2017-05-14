<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body id="strategy">
	<?php include '/../header.php'; ?>

	
	<div class="content segment mar">
		<div class="container">
			<div class="ui pointing menu">
			  <a href="Strategy" class="active item">攻略首页 </a>
			  <a id="hot" class="item">热门攻略 </a>
			  <a href="Strategy/publish" class="item">发表攻略 </a>
			  <div class="right menu">
			    <div class="item">
			      <div class="ui transparent icon input">
			        <input type="text" placeholder="用户、地点">
			        <i class="search link icon"></i>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="ui grid">
				<div class="eleven wide column">
					<div class="ui segment">
						<div class="ui feed" id="tmpl-container">
						  	
					    </div>
					</div>
					<div class="ui pagination menu" id="page">
					  
					</div>
				</div>
				<div class="five wide column">
					<h2 class="ui header">热门博主推荐</h2>
			<?php foreach($hotUsers as $hotUser){?>
					<div class="ui card">
					  	<div class="image dimmable">
							<img src=<?php echo $hotUser -> avator;?>>
					  	</div>
						<div class="content">
							<div class="header"><?php echo $hotUser -> user_name;?></div>
							<div class="meta">
								简介：<?php echo $hotUser -> introduction;?>
							</div>
							<div class="description">个人签名：<?php echo $hotUser -> signature;?></div>
					 	</div>
					  	<div class="extra content"> 
							<a class="right floated created focus-other-2" data-id=<?php echo $hotUser -> user_id;?> >
								<i class="heart icon <?php if($hotUser -> is_fans){ echo "red";}else{echo "outline";}?>"></i>
								关注
							</a>
							<a class="friends">
					 		 粉丝：<span><?php echo $hotUser -> CNT;?></span></a>
					 	</div>
					</div>
			<?php }?>	
				</div>
			</div>
		</div>
	</div>
	<script type="text/template" id="tmpl">
			<div class="event" style="position:relative;">
			    <div class="label" >
			      <img src="<%= avator%>">
			      <div class="user-focus">
			      	<div class="button ui red focus-other" data-id="<%= user_id%>"><%= is_fans%></div>
			      </div>
			    </div>
			    <div class="content">
			      <div class="summary"><a href="Personal/detail/<%= user_id%>" class="user"> <%= user_name%> </a> <a href="Strategy/detail/<%= strategy_id%>" style="color:#000;"><%= title%></a> <div class="date"><%= time%></div>
			      </div>
			    	<div class="article-title">途径：<%= way%></div>

			      <div class="extra text">行程：<%= trip%></div>
			      <div class="extra images">
			      <% _.each( photo, function(src){ %>
				    <a><img src="<%= src%>"></a>
				  <% }); %>
			      </div>
			      <div class="meta">
			        <a class="like"><i class="like icon"></i> <%= likes%> Likes </a>
			      </div>
			    </div>
	    	</div>
	    	<div class="ui section divider"></div>
	</script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/pikaday.js"></script>
	<script src="js/underscore.js"></script>
	<script>
	$(function(){
		var cur_page = 1;
		var userS = <?php if($user){echo $user -> user_id;}else{echo 'false';}?>;
		function loadData(url){

			$.get(url+'?page=1', function (res) {
				console.log(res);
	           	$('#tmpl-container').html('');
	           	for(var i=0;i<res.strategys.length;i++){
	           		var strategy = res.strategys[i];
                   	$('#tmpl-container').append(_.template($('#tmpl').html())(strategy));
	           	}
	           	if(userS){
		           	$('.focus-other').each(function(){
		           		var $this = $(this);
		           		$this.on('click',function(){
		           			var user_id = $this.data('id');
		           			$.get('strategy/beFans',{id:user_id},function(res){
		           				console.log(res);
		           				if(res == 'be'){
		           					$this.html('取消关注');
		           				}else{
		           					$this.html('关注');
		           				}
		           			});
		           		});
		           	});
		        } 
				var total_page = Math.ceil(res.total_rows/5);
				$('#page').html('');
           		$('#page').append('<a class="icon item prev"><i class="left arrow icon"></i></a>');
           		for(var j=1;j<=total_page;j++){
           			$('#page').append('<a class="item page '+(j==1?'active':'')+'">'+j+'</a>');
           		}
           		$('#page').append('<a class="icon item next"><i class="right arrow icon"></i></a>');

	           	$('#page .page').each(function(index,item){
	           		var $this = $(this);
 	           		$this.on('click',function(){
	           			$this.siblings().removeClass('active');
	           			$this.addClass('active');
	           			cur_page = index+1;
	           			$.get(url+'?page='+(index+1),function(res){
           					$('#tmpl-container').html('');
           					for(var i=0;i<res.strategys.length;i++){
				           		var strategy = res.strategys[i];
			                   	$('#tmpl-container').append(_.template($('#tmpl').html())(strategy));
				           	}
				           	$('.focus-other').each(function(){
				           		var $this = $(this);
       							if(userS){
					           		$this.on('click',function(){
					           			var user_id = $this.data('id');
					           			$.get('strategy/beFans',{id:user_id},function(res){
					           				console.log(res);
					           				if(res == 'be'){
					           					$this.html('取消关注');
					           				}else{
					           					$this.html('关注');
					           				}
					           			});
					           		});
					           	}
				           	});
	           			},'json')
	           		});
	           	});

	           	$('.prev').on('click',function(){
	           		if(cur_page == 1){
	           			return ;
	           		}
	           		$('#page .page').eq(cur_page-2).trigger('click');
	           	})

	           	$('.next').on('click',function(){
	           		if(cur_page == total_page){
	           			return ;
	           		}
	           		$('#page .page').eq(cur_page).trigger('click');
	           	})
	        },'json');
		}
		$('#hot').on('click',function(){
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
			loadData('strategy/getHot');
		})
		loadData('strategy/getAll');


		$('.focus-other-2').each(function(){
       		var $this = $(this);
       		if(userS){
       			$this.on('click',function(){
	       			var user_id = $this.data('id');
	       			$.get('strategy/beFans',{id:user_id},function(res){
	       				console.log(res);
	       				if(res == 'be'){
	       					$this.find('i').addClass('red');
	       					$this.find('i').removeClass('outline');
	       					var fans_num = parseInt($this.siblings().eq(0).find('span').html()) + 1;
	       					$this.siblings().eq(0).find('span').html(fans_num);
	       				}else{
	       					$this.find('i').addClass('outline');
	       					$this.find('i').removeClass('red');
	       					var fans_num = $this.siblings().eq(0).find('span').html() - 1;
	       					$this.siblings().eq(0).find('span').html(fans_num)
	       				}
	       			});
	       		});
       		}
       		
       	});
	});
	
	</script>
</body>
</html>