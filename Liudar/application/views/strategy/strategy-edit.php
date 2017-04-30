<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>溜达儿网</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/main.css">
	<!--引入wangEditor.css-->
	<link rel="stylesheet" type="text/css" href="assets/wangEditor/dist/css/wangEditor.min.css">
</head>
<body id="strategy-edit">
	<?php include '/../header.php'; ?>
	<div class="pad mar">
		<div class="container">
			<div class="ui large breadcrumb">
			  <a href = "Strategy" class="section">攻略</a>
			  <i class="right chevron icon divider"></i>
			  <div class="active section">发表攻略</div>
			</div>
			<div class="ui section divider"></div>
			<div class="ui form">
			  	<div class="inline field">
			    	<label>题目</label>
			    	<input type="text" placeholder="题目">
			  	</div>
			  	<div class="inline field">
			    	<label>途径</label>
			    	<input type="text" placeholder="题目">
			  	</div>
			  	<div class="inline field">
			    	<label>行程</label>
			    	<input type="text" placeholder="题目">
			  	</div>
			</div>

			<div class="ui section divider"></div>
			<div id="editor-field" style="height:400px;max-height:500px;">
			    <p>请输入内容...</p>
			</div>

			<div class="ui section divider"></div>
			<div class="ui button blue" id="publish">发表攻略</div>
			<div class="ui button pink" id="save">保存</div>
			<div class="ui button teal" id="cancel">取消</div>
		</div>
	</div>
	<!--引入jquery和wangEditor.js-->   <!--注意：javascript必须放在body最后，否则可能会出现问题-->
	<script type="text/javascript" src="assets/wangEditor/dist/js/lib/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="assets/wangEditor/dist/js/wangEditor.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script>
	$(function(){
		
		var editor = new wangEditor('editor-field');
    		editor.create();
		$('#publish').click(function () {
	        // 获取编辑器区域完整html代码
	        var html = editor.$txt.html();

	        // 获取编辑器纯文本内容
	        var text = editor.$txt.text();

	        // 获取格式化后的纯文本
	        var formatText = editor.$txt.formatText();
	        console.log(html);
	        console.log(text);
	        console.log(formatText);
    	});

	});
	
	</script>
</body>
</html>