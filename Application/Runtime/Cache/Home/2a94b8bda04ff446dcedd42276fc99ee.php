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
		
	</head>
	<body>
		<?php echo W('Public/header');?>
		<div class="wrap_lin"></div>
		<!--主体内容-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					
						<!--轮播图-->
						<div class="row">
							<div class="layui-carousel" id="banner">
							  <div carousel-item>
							  	<?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><img src="/Uploads/admin/banner/<?php echo ($vo['img']); ?>" height="100%" /></div><?php endforeach; endif; else: echo "" ;endif; ?>
							  </div>
							</div>
						</div>
						<!--置顶推荐-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header" style="margin-top: 20px;">
								  <h1 style="font-size: 20px;">置顶推荐&nbsp;<small>Top recommended</small></h1>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<?php $_result=zhiding();if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-md-3 recommended">
										    <a href="<?php echo U('Article/index',array('aid'=>$vo['id']));?>" class="thumbnail">
										      <img src="/Uploads/admin/article/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" style="height: 130px; width: 100%;">
										    </a>
										    <h2><a href="/thread/3.html" title="<?php echo ($vo['title']); ?>"><?php echo ($vo['title']); ?></a></h2>
										  </div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</div>
						<!--最新文章-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header" style="margin-top: 20px;">
								  <h1 style="font-size: 20px;">最新文章&nbsp;<small>Latest articles</small></h1>
								</div>
							</div>
							<div class="col-sm-12">
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media article_list">
									  <div class="media-left media-middle">
									    <a href="javascript:void(0)">
									      <img class="media-object" width="160" height="100" src="/Uploads/admin/article/<?php echo ($vo['img']); ?>" alt="...">
									    </a>
									  </div>
									  <div class="media-body">
									    <h4 class="media-heading article_title"><a href="<?php echo U('Article/index',array('aid'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a></h4>
									    <p style="margin: 5px 0px;">
											<span><a href="<?php echo U('Article/index',array('aid'=>$vo['id']));?>"><img src="/Public/v2/img/7.jpg" alt="<?php echo ($vo['author']); ?>"><?php echo ($vo['author']); ?></a></span>
											<span style="margin: 0px 20px;"><?php echo ($vo['addtime']); ?></span>
											<span class="pull-right" style="padding-right: 0;"> 
											<i class="layui-icon">&#xe63a;</i> 13 <i class="layui-icon">&#xe6c6;</i> 623</span>
										</p>
										<div class="article_desc">
											<?php echo ($vo['desc']); ?>
										</div>
									  </div>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							<div class="col-sm-12 text-center">
								<ul class="pagination">
								    <?php echo ($page); ?>
								  </ul>
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