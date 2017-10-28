<?php if (!defined('THINK_PATH')) exit();?><nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.php?s=" style="padding: 0px;">
      	<img src="/Public/v2/img/logo.png" height="50" />
      </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">首页 </a></li>
        <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="dropdown">
	          <a href="<?php echo U('Article/lst',array('id'=>$vo['id']));?>" <?php if(getChildren($vo['id'])): ?>data-toggle="dropdown" class="dropdown-toggle"<?php endif; ?> aria-haspopup="true" aria-expanded="false"><?php echo ($vo['name']); if(getChildren($vo['id'])): ?><span class="caret"></span><?php endif; ?></a>
	          <ul class="dropdown-menu" style="min-width: 100px;">
	          	<?php $_result=getChildren($vo['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Article/lst',array('id'=>$v['id']));?>"><?php echo ($v['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	          </ul>
	        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group col-sm-8 col-xs-8">
          <input type="text" class="form-control" placeholder="搜索你想要的...">
        </div>
        <div class="col-sm-4">
        	<button type="submit" class="btn btn-default">搜一搜</button>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">快速登录 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">个人中心</a></li>
            <li><a href="#">退出登录</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>