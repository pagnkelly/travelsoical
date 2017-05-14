<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
</head>
<body id="strategy-detail">
	<?php include '/../header.php'; ?>
	<div class="pad mar">
		<div class="container">
			<div class="ui large breadcrumb">
			  <a href = "Strategy" class="section">攻略</a>
			  <i class="right chevron icon divider"></i>
			  <div class="active section"><?php echo $user_info -> user_name; ?>的攻略</div>
			</div>
			<div class="ui section divider"></div>
			<div class="strategy-header">
				<img src="<?php echo $user_info -> avator; ?>" alt="" class="ui avatar image">	
				<span><?php echo $user_info -> user_name; ?><i class="icon male"></i></span>
				<div class="fans">粉丝数：<span><?php echo $fans; ?></span></div>
				<div class="button ui red focus-other" style="margin-top:5px;" data-id=<?php echo $user_info -> user_id; ?>><?php echo $user_info -> is_fans; ?></div>
			</div>
			
			
			<div class="ui segment">
			  	<?php echo $data -> content; ?>
			</div>

			<div class="strategy-footer">
				<p>
					途径：<?php echo $data -> way; ?>
				</p>
				<p>
					行程：<?php echo $data -> trip; ?>
				</p>
			</div>
			<div class="ui comments">
				  <h3 class="ui dividing header">评论</h3>
				  <div class="comment">
				    <a class="afanda avatar">
				      <img class="ui avatar image" src="img/local/local-person-1.jpg">
				    </a>
				    <div class="content">
				      <a class="author">马特</a>
				      <div class="metadata">
				        <span class="date">在今天5:42pm</span>
				      </div>
				      <div class="text">
				        怎样的艺术！
				      </div>
				      <div class="actions">
				        <a class="reply">回复</a>
				      </div>
				    </div>
				  </div>
				  <div class="comment">
				    <a class="afanda avatar">
				      <img class="ui avatar image" src="img/local/local-person-1.jpg">
				    </a>
				    <div class="content">
				      <a class="author">埃利奥特付</a>
				      <div class="metadata">
				        <span class="date">在昨天12:30am</span>
				      </div>
				      <div class="text">
				        <p>这对我的调查非常有用。感谢！</p>
				      </div>
				      <div class="actions">
				        <a class="reply">回复</a>
				      </div>
				    </div>
				    <div class="comments">
				      <div class="comment">
				        <a class="afanda avatar">
				          <img class="ui avatar image" src="img/local/local-person-1.jpg">
				        </a>
				        <div class="content">
				          <a class="author">珍妮赫斯</a>
				          <div class="metadata">
				            <span class="date">刚才</span>
				          </div>
				          <div class="text">
				            埃利奥特你总是这么好 :）
				          </div>
				          <div class="actions">
				            <a class="reply">回复</a>
				          </div>
				        </div>
				      </div>
				    </div>
				  </div>
				  <div class="comment">
				    <a class="avatar">
				      <img src="/images/avatar/small/joe.jpg">
				    </a>
				    <div class="content">
				      <a class="author">乔亨德森</a>
				      <div class="metadata">
				        <span class="date">5天前</span>
				      </div>
				      <div class="text">
				        老兄，这是可怕的。太感谢了！
				      </div>
				      <div class="actions">
				        <a class="reply">回复</a>
				      </div>
				    </div>
				  </div>
				  <form class="ui reply form">
				    <div class="field">
				      <textarea></textarea>
				    </div>
				    <div class="ui blue labeled submit icon button">
				      <i class="icon edit"></i> 添加回复
				    </div>
				  </form>
				</div>
		</div>
	</div>
	<!--引入jquery和wangEditor.js-->   <!--注意：javascript必须放在body最后，否则可能会出现问题-->
	<script type="text/javascript" src="assets/wangEditor/dist/js/lib/jquery-1.10.2.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script>
	$(function(){
		var userS = <?php if($user){echo $user -> user_id;}else{echo 'false';}?>;
       	if(userS){
			$('.focus-other').on('click',function(){
	       		var $this = $(this);
	   			var user_id = $this.data('id');
	   			$.get('strategy/beFans',{id:user_id},function(res){
	   				if(res == 'be'){
	   					$this.html('取消关注');
	   					var fans_num = parseInt($('.fans span').html()) +1;
	   					$('.fans span').html(fans_num);
	   				}else{
	   					$this.html('关注');
	   					var fans_num = parseInt($('.fans span').html()) -1;
	   					$('.fans span').html(fans_num);
	   				}
	   			});
	       	});
		}
	});
	
	</script>
</body>
</html>