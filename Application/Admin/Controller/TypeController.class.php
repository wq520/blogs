<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends CommonController {
	//注释的方法
	public function getDesc(){
		$array=[
			'desc'=>'分类控制器',
			[
				'Type/index'=>'分类列表',
				'Type/addType'=>'添加分类'
			]
		];
		return $array;
	}
    public function index(){
    	//读取分类列表
    	$m=M("Type");
    	$list=$m->select();
    	$this->assign("list",$list);
    	$this->display();
    }
    //添加分类
    public function addType(){
    	if(IS_POST){
    		$post=I("post.");
    		$type=D("Type");
    		//判断是添加的子分类还是顶级分类
    		if(isset($post['pid'])){
    			//添加子分类
    			$create=$type->create($post);
	    		if(!$create){
	    			$this->error($type->getError());
	    		}else{
	    			$result=$type->addType($post);
	    			if($result){
	    				$this->success("分类添加成功！");
	    			}else{
	    				$this->error("分类添加失败！");
	    			}
	    		}
    		}else{
    			$post['pid']=0;
    			$create=$type->create($post);
	    		if(!$create){
	    			$this->error($type->getError());
	    		}else{
	    			$result=$type->addType($post);
	    			if($result){
	    				$this->success("分类添加成功！");
	    			}else{
	    				$this->error("分类添加失败！");
	    			}
	    		}
    		}
    	}else{
			$this->display();
		}
    }
}