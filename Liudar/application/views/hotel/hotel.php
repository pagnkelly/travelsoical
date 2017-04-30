<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body id="hotel">
	<?php include '/../header.php'; ?>

	<div class="banner">
		<div class="ui form segment" id="search-hotel">
			<h1 class="ui header">酒店预定</h1>
			<div class="ui section divider"></div>
				<div class="two fields">
					<div class="field">
					  	<label>酒店名字</label>
					  	<div class="ui category search">
							<div class="ui left icon input">
								<i class="search icon"></i>
								<input class="prompt" type="text" placeholder="酒店名称" autocomplete="off">
							</div>
						<div class="results"></div>
				  		</div>
					</div>
					<div class="field">
				  		<label>地点搜索</label>
				    	<div class="ui local search">
							<div class="ui left icon input">
				 		 		<i class="world icon"></i>
				  				<input class="prompt" type="text" placeholder="目的地" autocomplete="off">
							</div>
						<div class="results"></div>
				    </div>
				</div>
			 </div>
			<div class="two fields">
				<div class="field">
				  <label>入住时间</label>
				  <div class="ui category search">
				<div class="ui left icon input">
				  <i class="wait icon"></i>
				  <input class="prompt" type="text" placeholder="入住时间" autocomplete="off" id="indatepicker">
				</div>
				<div class="results"></div>
				  </div>
				</div>
				<div class="field">
				    <label>离店时间</label>
				    <div class="ui local search">
						<div class="ui left icon input">
				 		 <i class="wait icon"></i>
				 		 <input class="prompt" type="text" placeholder="离店时间" autocomplete="off" id="outdatepicker">
					</div>
						<div class="results"></div>
					</div>
				</div>
			</div>
				<div class="ui primary button" id="search-btn">
				           搜索       
				</div>
			</div>
	</div>

	<div class="content segment">
		<div class="container">
		<div class="ui grid recommend">
			<div class="five wide column">
				<h2 class="ui header">每日酒店推荐</h2>
			<?php foreach($push as $pushItem){
			?>
				<div class="ui card">
				  	<div class="image dimmable">
						<img src=<?php echo $pushItem-> img; ?>>
				  	</div>
					<div class="content">
						<div class="header"><?php echo $pushItem-> hotel_name; ?><span class="level"><?php echo $pushItem-> level; ?>星级</span></div>
						<div class="meta">
							<i class="marker icon"></i>
					 		<a class="group"><?php $str = mb_substr($pushItem-> address,0,2,"UTF-8"); echo $str ?></a>
						</div>
						<div class="description"><?php echo $pushItem-> address_intro;?></div>
				 	</div>
				  	<div class="extra content">
						<a class="right floated created price">￥<?php echo $pushItem-> price; ?>起</a>
						<a class="friends price">
				 		 <?php echo $pushItem-> sale_num; ?>人住过</a>
				 	</div>
				</div>
			<?php }?>
			</div>
			<div class="eleven wide column">
				<h2 class="ui header">查询酒店结果</h2>
				<div class="ui menu">
 					<a class="item">
					默认排序
				 	</a>
				 	<a class="item">
						星级
						<i class="sort icon"></i>
				 	</a>
				 	<a class="item">
						价格
						<i class="sort icon"></i>
				 	</a>
				 	<a class="item">
						评分
						<i class="arrow down icon"></i>
				 	</a>
				 	<a class="icon item prev">
				    	<i class="left arrow icon"></i>
					</a>
				 	<a class="icon item next">
					    <i class="right arrow icon"></i>
					</a>
					<a class="item page_detail">4/8</a>
				</div>
				<div class="ui divided items" id="tmpl-container">
				  	
					
				</div>
				<div class="ui pagination menu" id="page">
				 
				</div>
			</div>
		</div>
	</div>
	<script type="text/template" id="tmpl">
					<div class="item">
				    	<div class="image">
				      		<img src="<%= img%>">
				   		</div>
				    	<div class="content">
				     		<a href="Hotel/detail?id=<%= hotel_id%>" class="header ui inverted blue"><%= hotel_name%><span class="level"><%= level%>星级</span></a>
				      		<div class="meta">
				       		 	<span class="cinema"><%= address_intro%></span>
				      	</div>
				      	<div class="description font-blue">
				      		评价： 
							<div class="ui large star rating" data-rating="2" data-max-rating="<%= score%>"></div>
							| <%= comments%>条点评
				     	 </div>
				      		<div class="extra">
				        		<i class="desktop icon"></i>
				        		<i class="wifi icon"></i>
				        		<i class="car icon"></i>
				        		<a href="" class="item right floated price">￥<%= price%>起</a>	
				      		</div>
				    	</div>
				    </div>
	</script>

	</script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/pikaday.js"></script>
	<script src="js/underscore.js"></script>
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
	        }
	    });

		$('#search-btn').on('click',function(){
			loadData();
		});

		$('.ui.rating').rating();
		$('.ui.rating').rating({
		    clearable: false,
		    interactive: false
		});
		var cur_page = 1;
		function loadData(url){

			$.get(url+'?page=1', function (res) {
	           	$('#tmpl-container').html('');
	           	for(var i=0;i<res.hotels.length;i++){
	           		var hotel = res.hotels[i];
                   	$('#tmpl-container').append(_.template($('#tmpl').html())(hotel));
	           	}
				var total_page = Math.ceil(res.total_rows/9);
				$('.page_detail').html((cur_page)+'/'+total_page);
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
	           			$('.page_detail').html((cur_page)+'/'+total_page);
	           			$.get(url+'?page='+(index+1),function(res){
           					$('#tmpl-container').html('');
           					for(var i=0;i<res.hotels.length;i++){
			           		var hotel = res.hotels[i];
		                   	$('#tmpl-container').append(_.template($('#tmpl').html())(hotel));
				           	}
	           			},'json')
	           		});
	           	});

	           	$('.prev').on('click',function(){
	           		if(cur_page == 1){
	           			return ;
	           		}
	           		$('.page_detail').html((cur_page-1)+'/'+total_page);
	           		$('#page .page').eq(cur_page-2).trigger('click');
	           	})

	           	$('.next').on('click',function(){
	           		if(cur_page == total_page){
	           			return ;
	           		}
	           		$('.page_detail').html((cur_page+1)+'/'+total_page);
	           		$('#page .page').eq(cur_page).trigger('click');
	           	})
	        },'json');
		}

		loadData('hotel/getAll');

			

		
        

	});
	
	</script>

</body>
</html>