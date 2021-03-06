<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	
	<div class="main container" id="admin-login">
		<h1 class="ui header">账号登陆</h1>
		<div class="ui section divider"></div>
		<div class="ui grid">
			<div class="ten wide column">
				<img class="ui medium centered image" src="img/hotel/hotel-tuijian-2.jpg" alt="">
			</div>
			<div class="six wide column">
				<h1 class="ui header centered title">酒店管理登陆</h1>
				<form id="login" class="ui fluid form segment">
		            <div class="field">
		                <label class="">用户名</label>
		                <div class="ui left icon input">
		                    <input type="text" name="userName" placeholder="手机号/邮箱" id="name">
		                    <i class="user icon"></i>
		                </div>
		            </div>
		            <div class="field">
		                <label class="">密码</label>
		                <div class="ui left icon input">          
		                    <input type="password" name="password" placeholder="请输入密码" id="password">
		                    <i class="lock icon"></i>
		                </div>
		            </div>
		            <div class="inline field">
		                <div class="ui checkbox">
		                    <input type="checkbox" name="terms">
		                    <label>记住密码</label>
		                </div>
		                
		            </div>
		            <div class="inline field">
		                <div class="ui blue submit fluid button" id="submit">登录</div>
		            </div>
		             
		        </form>
			</div>
		</div>
		<div class="ui section divider"></div>
		<div class="ui labels">
			<a class="ui black label">关于liudar.com</a>
			<a class="ui yellow label">酒店加盟</a>
			<a class="ui green label">业务合作</a>
			<a class="ui blue label">加入我们</a>
			<a class="ui orange label">广告业务</a>
			<a class="ui purple label">联系我们</a>
			<a class="ui red label">反馈</a>
			<a class="ui teal label">投诉</a>
		</div>
	</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
	$(function(){
		$('#submit').on('click',function(){
			var name = $.trim($('#name').val());
			var password = $('#password').val();
			$.post('admin/checkLogin',{name:name,password:password},function(res){
				console.log(res);
				if(res == 'true'){
					location.href='admin/main';
				}
				if(res == 'false'){
					alert('用户名或密码不正确');
				}
			});
		});
	});
</script>
</body>
</html>