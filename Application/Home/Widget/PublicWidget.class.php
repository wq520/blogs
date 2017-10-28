<?php
namespace Home\Widget;
use Think\Controller;
class PublicWidget extends Controller {
	//头部
	public function header(){
		$map['pid']=['eq',0];
		$list=M('Type')->where($map)->select();
//		echo "<pre>";
//		var_dump($list);die;
        $this->assign('nav',$list);
        $this->display('Public:header');
	}
	//随机文章
	public function rand(){
		$Article = M("Article");
		$list = $Article->limit(10)->order('rand()')->select();
		$this->assign('list',$list);
        $this->display('Right:rand');
	}
}