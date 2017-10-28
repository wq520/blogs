<?php
namespace Home\Controller;
use Think\Controller;
class PhotoController extends Controller {
    public function index(){
    	//查询出相册
    	$m=M("photoType");
    	$list=$m->select();
    	$this->assign("list",$list);
    	$this->display();
    }
    //用户注册
    public function person(){
    	//获取id
    	$id=I("get.id");
    	$m=M("photo");
    	$map['type']=['eq',$id];
    	$list=$m->where($map)->select();
    	$this->assign("list",$list);
    	$this->display();
    }
}