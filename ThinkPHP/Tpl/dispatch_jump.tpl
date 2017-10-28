<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<link rel="stylesheet" href="__PUBLIC__/admin/css/bootstrap.min.css" />
<script type="text/javascript" src="__PUBLIC__/admin/js/jquery.min.js" ></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/jquery2.0.0.min.js" ></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/bootstrap.min.js" ></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">跳转提示</h4>
			      </div>
			      <div class="modal-body text-center">
			        <?php if(isset($message)) {?>
					<p class="success"><?php echo($message); ?></p>
					<?php }else{?>
					<p class="error"><?php echo($error); ?></p>
					<?php }?>
					<b id="wait"><?php echo($waitSecond); ?></b>秒后自动跳转！
			      </div>
			      <div class="modal-footer">
			        <a id="href" href="<?php echo($jumpUrl); ?>" class="btn btn-primary">点击跳转</a>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		(function(){
		$('#myModal').modal("show");
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000);
		})();
		$(".modal-backdrop").remove();//删除class值为modal-backdrop的标签，可去除阴影
	</script>
<!--<div class="system-message">
<?php if(isset($message)) {?>
<h1>:)</h1>
<p class="success"><?php echo($message); ?></p>
<?php }else{?>
<h1>:(</h1>
<p class="error"><?php echo($error); ?></p>
<?php }?>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>-->
</body>
</html>