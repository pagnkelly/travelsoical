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
			  		<input class="prompt" type="text" placeholder="目的地" autocomplete="off" id="destination">
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
 					<a class="item" id ="defaultRank" >
					默认排序
				 	</a>
				 	<a class="item" id="priceRank">
						价格
						<i class="sort icon"></i>
				 	</a>
				 	<a class="item" id="sales">
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
			<div class="ui card" style="cursor:pointer" data-id="<%= local_id%>" >
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
			 var destination = $.trim($('#destination').val());
			if(destination == ''){
				return ;
			}else{
				loadData('local/search',{destination:destination});
			}
		});

		$('#defaultRank').on('click',function(){
			loadData('local/getAll');
		});
		var price = 'desc';
		var sales = 'desc';
		var salesClass = 'up'
		$('#priceRank').on('click',function(){
			console.log(Rankdata);
			loadData(action,$.extend(Rankdata,{action: 'price',rank:price}));
			price = price == 'desc'? 'asc':'desc';
		});
		$('#sales').on('click',function(){
			$(this).find('i').addClass(salesClass);
			salesClass = salesClass == 'down' ? 'up' : 'down';
			$(this).find('i').removeClass(salesClass);
			loadData(action,$.extend(Rankdata,{action: 'sell_num',rank:sales}));
			sales = sales == 'desc'? 'asc':'desc';
		});

		$('.ui.rating').rating();
		$('.ui.rating').rating({
		    clearable: false,
		    interactive: false
		});

		
		var action;
		var Rankdata ={};
		var cur_page = 1;
		function loadData(url,reqdata){
			action = url;
			if(reqdata){
				Rankdata = reqdata;
			}
			$.get(url,$.extend({page:1},reqdata),function (res) {
				console.log(res);
	           	$('#tmpl-container').html('');
	           	for(var i=0;i<res.locals.length;i++){
	           		var local = res.locals[i];
                   	$('#tmpl-container').append(_.template($('#tmpl').html())(local));
	           	}
				var total_page = Math.ceil(res.total_rows/8);
				$('#page').html('');
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
	           			$.get(url,$.extend({page:cur_page},reqdata),function(res){
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

	           	$('.ui.card').each(function(index,item){
					var $item = $(item);
					var local_id = $item.data('id');
					$item.on('click',function(){
						location.href= 'Local/detail?id='+local_id;
					});
				})
	        },'json');
		}

		loadData('local/getAll');
	});
	
	</script>
</body>
</html>