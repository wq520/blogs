<?php
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends CommonController {
	//注释的方法
	public function getDesc(){
		$array=[
			'desc'=>'文章管理',
			[
				'Photo/index'=>'相册列表',
				'Photo/add'=>'添加相册',
				'Photo/del'=>'删除相册',
				'Photo/edit'=>'编辑相册',
			]
		];
		return $array;
	}
	//文章列表
    public function index(){
    	//读取分类
    	$type=M("type");
    	$typelist=$type->select();
    	//读取文章
    	$m=M("article");
    	$list=$m->select();
    	foreach($list as $key=>&$val){
    		foreach($typelist as $k=>$v){
    			if($val['type']==$v['id']){
    				$val['type']=$v['name'];
    			}
    		}
    	}
    	$this->assign("list",$list);
    	$this->display();
    }
    public function add(){
    	//判断是否有文件上传
    	if(IS_POST){
    		if($_FILES['cover']['size']<=0){
    			//没有文件上传
    			$this->error("必须要上传封面图哟！");
    		}else{
    			//上传文件
    			$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = './Uploads/admin/photo/'; // 设置附件上传根目录
//				$upload->savePath = ''; // 设置附件上传（子）目录
				$upload->autoSub=false;
				// 上传文件
				$info = $upload->upload();
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功
	    			$post=I("post.");
					$post['cover']=$info['cover']['savename'];
	    			$category=D("photoType");
	    			$res=$category->create($post);
	    			if(!$res){
	    				$this->error($category->getError());
	    			}else{
	    				$result=$category->addtype($post);
		    			if($result){
		    				$this->success("添加相册成功！");
		    			}else{
		    				$this->error("添加相册失败！");
		    			}
	    			}
				}
				
    		}
    	}else{
    		$this->display();
    	}
    }
    public function del(){
    	//接收id
    	$id=I("get.id");
    	$m=M("article");
    	//查询出图片
    	$img=$m->field("img")->find($id);
    	unlink('./Uploads/admin/article/'.$m->field("img")->find($id)['img']);
    	$result=$m->delete($id);
    	if($result){
    		$this->success("删除成功！");
    	}else{
    		$this->error("删除失败！");
    	}
    }
    //修改的方法
    public function edit(){
    	$this->display();
    }
    public function upimg(){
    	if(IS_POST){
    			//上传文件
    			$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = './Uploads/admin/photo/'; // 设置附件上传根目录
//				$upload->savePath = ''; // 设置附件上传（子）目录
				$upload->autoSub=false;
				// 上传文件
				$info = $upload->upload();
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功
					foreach($info as $key=>$val){
						$post=I("post.");
						$post['desc']=$post['desc'][$key];
						$post['img']=$info[$key]['savename'];
						$m=M("photo");
						$m->startTrans();			
						$result=$m->add($post);
					}
					if($result){
						$m->commit();
						$this->success("照片上传成功！");
					}else{
						$m->rollback();
						$this->error("照片上传失败！");
					}
				}
    }else{
    		//读取相册类别
    		$m=M("photoType");
    		$list=$m->select();
    		$this->assign("list",$list);
    		$this->display();
    	}
    }
}