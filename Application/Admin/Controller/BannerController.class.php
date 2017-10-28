<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends CommonController {
    public function index(){
    	$this->display();
    }
	public function doAdd(){
		if(IS_POST){
			//接收post
			$post=I("post.");
			//文件上传
			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     0 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     './Uploads/admin/banner/'; // 设置附件上传根目录
//		    $upload->savePath  =     ''; // 设置附件上传（子）目录
			$upload->autoSub=false;
		    // 上传文件 
		    $info   =   $upload->uploadOne($_FILES['img']);
			//获得文件名
			$post['img']=$info['savename'];
			$banner=M("banner")->add($post);
		    if(!$banner) {
		        $this->error("添加失败！");
		    }else{// 上传成功
		        $this->success('添加成功！');
		    }
		}else{
			$this->display("add");
		}
	}
}