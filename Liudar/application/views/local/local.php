<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body id="local">
	<?php include '/../header.php'; ?>

	<div class="banner">
		<div class="ui form segment" id="search-hotel">
			<h1 class="ui header">当地向导			<span class="description" style="font-size: 12px; color: #0084bb; margin-left: 20px;">
					    正规持证中文向导，当地人带你玩，绝对不会被坑。
			 </span>	</h1>
		

			
			<div class="ui section divider"></div>

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
		<div class="container recommend">
				<h2 class="ui header">查询导游结果</h2>
				<div class="ui menu">
 					<a class="item">
					默认排序
				 	</a>
				 	<a class="item">
						价格
						<i class="sort icon"></i>
				 	</a>
				 	<a class="item">
						销量
						<i class="arrow down icon"></i>
				 	</a>
			 		<a class="icon item prev">
				    	<i class="left arrow icon"></i>
					</a>
				 	<a class="icon item next">
					    <i class="right arrow icon"></i>
					</a>
					<a class="item page_detail"></a>
				</div>
 				<div class="ui cards" id="tmpl-container">
 					

 				</div>
				<div class="ui pagination menu" style="margin-top:10px;" id="page">
				  	
				</div>
	</div>


	<script type="text/template" id="tmpl">
			<div class="ui card" style="cursor:pointer">
			  	<div class="image dimmable">
					<img src="<%= photo%>">
			  	</div>
				<div class="content">
					<div class="header"><%= local_name%></div>
					<div class="meta">
						<i class="marker icon"></i>
				 		<a class="group"><%= local_city%></a>
					</div>
					<div class="description"><%= local_des%></div>
			 	</div>
			  	<div class="extra content">
					<a class="right floated created price">￥<%= price%>起</a>
					<a class="friends price">
			 		 已售<%= sell_num%></a>
			 	</div>
			</div>
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
			console.log(outDatePicker.toString());
		});

		$('.ui.rating').rating();
		$('.ui.rating').rating({
		    clearable: false,
		    interactive: false
		});

		$('.ui.card').each(function(index,item){
			var $item = $(item);
			$item.on('click',function(){
				location.href= 'Local/detail';
			});
		})

		var cur_page = 1;
		function loadData(url){
			$.get(url+'?page=1', function (res) {
	           	$('#tmpl-container').html('');
	           	for(var i=0;i<res.locals.length;i++){
	           		var local = res.locals[i];
                   	$('#tmpl-container').append(_.template($('#tmpl').html())(local));
	           	}
				var total_page = Math.ceil(res.total_rows/8);
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
           					for(var i=0;i<res.locals.length;i++){
			           		var local = res.locals[i];
		                   	$('#tmpl-container').append(_.template($('#tmpl').html())(local));
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

		loadData('local/getAll');
	});
	
	</script>
</body>
</html>