<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
	<script>

			function getLength(str) {
			    return str.replace(/[^ -~]/g, '').length;
			}
			 
			function limitMaxLength(str, maxLength) {
			    var result = [];
			    for (var i = 0; i < maxLength; i++) {
			        var char = str[i]
			        if (/[^ -~]/.test(char))
			            maxLength--;
			        result.push(char);
			    }
			    return result.join('');
			}
			var maxLength = 11;
			 
			function onInput() {
			    if (getLength(this.value) > maxLength)
			        this.value = limitMaxLength(this.value, maxLength);
			}
	</script>
</head>
<body>
	<div class="ui menu">
		<div class="right menu">
			<a class="green item" href="Index">
				<i class="home icon"></i> 溜达儿网首页
			</a>
			<div class="item" id="regist">
				<div class="ui primary button">注册</div>
			</div>
			<div class="item" id="login">
				<div class="ui button">登陆</div>
			</div>
	    </div>
	</div>
	<div class="main container" id="login">
		<h1 class="ui header">账号注册</h1>
		<div class="ui section divider"></div>
		<div class="ui grid">
			<div class="left floated eight wide column ">
				<div class="ui form">
					<div class="inline fields">
						<div class="field" >
							<label>手机号</label>
							<input type="text" placeholder="请输入手机号码" id="telphone"  oninput="this.value=this.value.replace(/\D/g,'')">
							<div class="ui warning message">
							  手机号需有效且不能为空。
							</div>
						</div>
					</div>
					<div class="inline fields">
						<div class="field">
							<label>邮箱</label>
							<input type="text" placeholder="请输入邮箱" id="mail">
							<div class="ui warning message">
							  邮箱格式不正确。
							</div>
						</div>
					</div>
					<div class="inline fields">
						<div class="field">
							<label>名字</label>
							<input type="text" placeholder="请输入密码" id="name" oninput="onInput.call(this)">
							<div class="ui warning message">
							  以字母开头，长度在6~18之间，只能包含字符、数字和下划线。
							</div>
						</div>
					</div>
					<div class="inline fields">
						<div class="field">
							<label>密码</label>
							<input type="password" placeholder="请输入密码" id="password">
							<div class="ui warning message">
							  以字母开头，长度在6~18之间，只能包含字符、数字和下划线。
							</div>
						</div>
					</div>
					<div class="inline fields">
						<div class="field">
							<label>重复密码</label>
							<input type="password" placeholder="请输入密码" id="password-repeat">
							<div class="ui warning message">
							  两次输入密码须相同
							</div>
						</div>
					</div>
					<div class="inline fields">
						<div class="field">
							<label>手机验证码</label>
							<input type="text" placeholder="请输入验证码" id="verify">
							<div class="ui warning message">
							  验证码不能为空
							</div>
						</div>
					</div>
					<div class="inline field">
						<div class="ui checkbox">
							<input type="checkbox" id="protocol">
							<label>同意条款协议</label>
						</div>
						<div class="ui warning message">
							  必须同意条款协议
						</div>
					</div>
					<div class="inline field" >
		                <div class="ui orange submit button" id="reg-btn">注册</div>
		            </div>
				</div>
			</div>
			<div class="six wide column right floated ">
			  <div class="ui message">
			    <div class="header">成为溜达儿网会员后，您可以</div>
				    <ul class="list">
				      <li>畅游与溜达儿合作的机票、酒店、度假代理商网站，轻松管理订单.</li>
				      <li>获取最新，最时尚，最舒适的旅游信息.</li>
				    </ul>
				  </div>
				<img class="ui large centered image" src="img/regist.jpg" alt="">
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
			var regist = document.querySelector('#regist');
			var login = document.querySelector('#login');
			login.onclick = function(){
				window.location.href='Login'
			}
			regist.onclick = function(){
				window.location.href='Regist'
			}


			$('#reg-btn').on('click',function(){
				var flag = true,
					telphone= checkPhone(),
					mail = checkMail(),
					name = checkName(),
					password = checkPassword(),
					passwordRepeat = checkPasswordRepeat(),
					protocol = checkProtocol();
				flag = telphone && mail && name && password && passwordRepeat&& protocol;
				if(flag){
					$.post('Regist/save',{
						telphone: telphone,
						mail: mail,
						name: name,
						password: password
					},function(res){
						if(res == 'telphone'){
							alert('此电话号码已经注册');
						}
						if(res == 'name'){
							alert('此用户名已注册');
						}
						if(res == 'false'){
							alert('可能由于网络原因，注册失败');
						}
						if(res == 'true'){
							location.href = "index";
						}
					});
				}
			});

			function checkPhone (){
				var $telphone = $('#telphone');
				var value = $telphone.val();

				if(!/^1[34578]\d{9}$/.test(value)){
					$telphone.siblings().eq(1).css('display','inline');
					return false;
				}else{
					$telphone.siblings().eq(1).css('display','none');
					return value;
				}
			}

			function checkMail (){
				var $mail = $('#mail');
				var value = $mail.val();

				if(!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(value)){
					$mail.siblings().eq(1).css('display','inline');
					return false;
				}else{
					$mail.siblings().eq(1).css('display','none');
					return value;
				}
			}

			function checkName (){
				var $name = $('#name');
				var value = $name.val();
				return value;
			}

			function checkPassword (){
				var $password = $('#password');
				var value = $password.val();

				if(!/^[a-zA-Z]\w{5,17}$/.test(value)){
					$password.siblings().eq(1).css('display','block');
					return false;
				}else{
					$password.siblings().eq(1).css('display','none');
					return value;
				}
			}


			function checkPasswordRepeat (){
				var $passwordRepeat = $('#password-repeat');
				var $password = $('#password');
				var passwordValue = $password.val();
				var value = $passwordRepeat.val();

				if(passwordValue !== value){
					$passwordRepeat.siblings().eq(1).css('display','inline');
					return false;
				}else{
					return value;
				}
			}

			function checkProtocol (){
				var $protocol = $('#protocol');

				if($protocol.prop('checked')){
					return true;
				}else {
					return false;
				}

			}
		});
		
	</script>
</body>
</html>