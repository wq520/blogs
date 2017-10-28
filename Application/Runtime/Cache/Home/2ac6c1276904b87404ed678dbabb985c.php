<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
		<title><?php echo C('title');?></title>
		<meta content="<?php echo C('keywords');?>" name="keywords">
		<meta content="<?php echo C('description');?>" name="description">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="/Public/home/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/Public/v2/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/Public/v2/layui/css/layui.css" />
		<link rel="stylesheet" href="/Public/v2/css/common.css" />
		
	<script type="text/javascript" src="/Public/v2/wangEditor/wangEditor.min.js" ></script>

	</head>
	<body>
		<?php echo W('Public/header');?>
		<div class="wrap_lin"></div>
		<!--主体内容-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					
	<div class="row">
		<div class="col-sm-1">
			<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		</div>
		<div class="col-sm-11">
			<div class="page-header">
			  <h1 style="font-size: 16px;font-weight: bold;"><?php echo ($list['title']); ?></h1>
			  <p style="margin: 5px 0px;">
				<span class="pull-right" style="padding-right: 0;"> 
				<i class="layui-icon">&#xe63a;</i> 13 <i class="layui-icon">&#xe6c6;</i> 623</span>
				<span class="clearfix"></span>
			 </p>
			</div>
			<div class="article_content">
				<?php echo (htmlspecialchars_decode($list['content'])); ?>
			</div>
			<div class="commont_box">
				<div class="page-header">
				  <h1 style="font-size: 16px;">有什么想法、冲我来！不要憋坏了&nbsp;<small>Give my opinion</small></h1>
				</div>
				<!--评论框-->
				<div class="layui-input-block" style="width: 100%;margin: 0px;">
					<!--PC和WAP自适应版-->
					<div id="SOHUCS" sid="<?php echo ($list['id']); ?>" ></div> 
					<script type="text/javascript"> 
					(function(){ 
					var appid = 'cysIwtFax'; 
					var conf = 'prod_7704a0ad68faab356d6f98b60ee99d62'; 
					var width = window.innerWidth || document.documentElement.clientWidth; 
					if (width < 960) { 
					window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
			    </div>
			</div>
		</div>
	</div>

				</div>
				<div class="col-sm-3">
					<!--打赏投稿-->
					<div class="row">
						<div class="col-sm-12">
							<div class="page-header" style="margin: 0px;margin-bottom: 5px;">
							  <h1 style="font-size: 20px;font-weight: bolder;">站长有话说&nbsp;<small>My name is Zhang Chao.</small></h1>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="jumbotron text-center layui-bg-green" style="padding-left: 0px; padding-right: 0px;margin-bottom: 0px;">
							  <p style="font-size: 16px;">我就是我、世间不一样的烟火！</p>
							</div>
						</div>
						<div class="col-sm-12" style="margin-top: 10px;">
							<div class="row">
								<div class="col-xs-6 col-md-6 text-center">
								    <a href="#" class="thumbnail count_text">
									  <p><?php echo articleCount();?></p>
									  <p>文章总数</p>
								    </a>
								</div>
								<div class="col-xs-6 col-md-6 text-center">
								    <a href="#" class="thumbnail count_text">
									  <p><?php echo countMember();?></p>
									  <p>会员总数</p>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-6">
									<a class="btn btn-block btn-warning">我要投稿</a>
								</div>
								<div class="col-sm-6 col-xs-6">
									<a class="btn btn-block btn-primary" id="reward">我要打赏</a>
								</div>
							</div>
						</div>
					</div>
					<!--标签云-->
					<div class="row" style="margin-top: 10px;">
						<div class="col-sm-12">
							<div class="panel panel-default">
							  <div class="panel-body" style="padding: 0px;">
								<blockquote class="layui-elem-quote" style="padding: 10px;">热门标签</blockquote>
								<div class="tabs_yun">
									<ul>
										<li>
											<a href="">机器人</a>
										</li>
										<li>
											<a href="">新媒体</a>
										</li>
										<li>
											<a href="">DDOS攻击</a>
										</li>
										<li>
											<a href="">超强CC</a>
										</li>
										<li>
											<a href="">PHP超音速入门</a>
										</li>
										<li>
											<a href="">Python速学</a>
										</li>
										<li>
											<a href="">新媒体</a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							  </div>
							</div>
						</div>
					</div>
					<!--精选文章-->
					<div class="row" style="margin-top: 10px;">
						<div class="col-sm-12">
							<div class="panel panel-default">
							  <div class="panel-body" style="padding: 0px;">
								<blockquote class="layui-elem-quote" style="padding: 10px;">精选文章</blockquote>
								<div class="tuijian_article">
									<?php $_result=jingxuan();if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row">
										  <div class="col-sm-12 col-md-12">
										    <div class="thumbnail tuijian" style="border: none;">
										      <img src="/Uploads/admin/article/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>">
										      <div class="caption">
										        <h3 style="margin: 10px 0px;"><?php echo ($vo['title']); ?></h3>
										        <p><a href="<?php echo U('Article/index',array('aid'=>$vo['id']));?>" class="btn btn-primary btn-block">查看详细</a></p>
										      </div>
										    </div>
										  </div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							  </div>
							</div>
						</div>
					</div>
					<!--热门推荐-->
					<div class="row" style="margin-top: 10px;">
						<div class="col-sm-12">
							<div class="panel panel-default">
							  <div class="panel-body" style="padding: 0px;">
								<blockquote class="layui-elem-quote" style="padding: 10px;">热门推荐</blockquote>
								<div class="hot_article">
									<?php $_result=hotarticle();if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-group">
										  <a href="#" class="list-group-item" style="border: none;">
										    <h4 class="list-group-item-heading"><?php echo ($vo['title']); ?></h4>
										    <p class="list-group-item-text text-right" style="font-size: 16px;font-weight: bold;"><?php echo ($vo['addtime']); ?></p>
										  </a>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							  </div>
							</div>
						</div>
					</div>
					<!--友情链接-->
					<div class="row" style="margin-top: 10px;">
						<div class="col-sm-12">
							<div class="panel panel-default">
							  <div class="panel-body" style="padding: 0px;">
								<blockquote class="layui-elem-quote" style="padding: 10px;border-left: 5px solid #f1754f;">友情链接</blockquote>
								<div class="link_firend">
									<ul>
										<li><a href="">百度一下</a></li>
										<li><a href="">张超博客</a></li>
									</ul>
								</div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--底部-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 blog_footer">
					<p>Copyright©2016-2017  | 张超个人技术博客 保留所有权利. 黔ICP备15002534号-4 | 商务合作联系：QQ:416716328</p>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/Public/v2/js/jquery-1.10.2.min.js" ></script>
		<script type="text/javascript" src="/Public/v2/js/jquery-2.0.3.min.js" ></script>
		<script type="text/javascript" src="/Public/v2/layui/layui.js" ></script>
		<script type="text/javascript" src="/Public/v2/layui/layui.all.js" ></script>
		<script type="text/javascript" src="/Public/v2/js/common.js" ></script>
		<script type="text/javascript" src="/Public/v2/bootstrap/js/bootstrap.min.js" ></script>
		<script type="text/javascript">
			$(function(){
				$(function(){
					$("#reward").click(function(){
						$.post("<?php echo U('Reward/reward');?>", {}, function(str){
						  layer.open({
						  	title:'感谢您的支持、我会继续努力的！',
						    type: 1,
						    content: str, //注意，如果str是object，那么需要字符拼接。
						    area:['','420px']
						  });
						});
					});
				});
			});
		</script>
	<script type='text/javascript' color='0,255,0' zIndex='-1' opacity='1' count='99' src='//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js'></script>
	</body>
</html>