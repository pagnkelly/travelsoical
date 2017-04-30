<?php
    $user = $this -> session -> userdata('LiuDarUser');
?>
<div class="ui fixed menu">
	<a href="Index" class="green item">
		<i class="home icon"></i> 首页
	</a>
	<a href="Hotel" class="red item">
		<i class="building icon"></i> 酒店
	</a>
	<a href="Local" class="blue item">
		<i class="male icon"></i> 当地人
	</a>
	<a href="Strategy" class="purple item">
		<i class="book icon"></i> 攻略
	</a>
	<div class="right menu">
		<?php
			if($user){
		?>	
		<div class="ui item label">
		 <?php echo $user -> user_name;?>
		  <a href="Personal" class="detail"><i class="mail icon"></i> 23</a>
		</div>
		<div class="item">
			<div class="ui primary button" id="logout">退出</div>
		</div>
		<?php }else{ ?>

		<div class="item">
			<div class="ui primary button" id="regist">注册</div>
		</div>
		<div class="item">
			<div class="ui button" id="login">登陆</div>
		</div>
		<?php } ?>
    </div>
</div>

<script type="text/javascript">
window.onload = function(){	
	var aItems = document.querySelectorAll('.fixed.menu a');
	aItems.forEach(function(item,index){
		if(item.href == window.location.href || item.href == window.location.href+'Index'){
			item.className += ' active';
			if(window.location.href.indexOf('Personal')>=0){
				item.querySelector('i').className += ' red';
			}
		}
	});
	<?php
			if($user){
	?>	
	var logout = document.querySelector('#logout');
	logout.onclick = function(){
		window.location.href='Logout';
	}
	<?php }else{ ?>
	var regist = document.querySelector('#regist');
	var login = document.querySelector('#login');
	
	login.onclick = function(){
		window.location.href='Login';
	}
	regist.onclick = function(){
		window.location.href='Regist';
	}
	<?php } ?>
	
	

};
</script>