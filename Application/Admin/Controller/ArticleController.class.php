<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	//注释的方法
	public function getDesc(){
		$array=[
			'desc'=>'文章管理',
			[
				'Article/index'=>'文章列表',
				'Article/addArticle'=>'执行添加文章',
				'Article/add'=>'添加文章',
				'Article/del'=>'删除文章',
				'Article/edit'=>'修改文章'
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
    	$Article = M('Article'); // 实例化User对象
		$count = $Article->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Article->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
    	foreach($list as $key=>&$val){
    		foreach($typelist as $k=>$v){
    			if($val['type']==$v['id']){
    				$val['type']=$v['name'];
    			}
    		}
    	}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
    }
    public function add(){
    	//查询文章文类
    	$category=M("Type");
    	$list=$category->select();
    	$this->assign("list",$list);
    	$this->display();
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
    	if(IS_POST){
    		$map=I("post.");
    		//先判断是否有文件上传
    		if($_FILES['img']['size']<=0){
    			$map['img']=$map['oldimg'];
    		}else{
    			//删除以前的文件
    			unlink('./Uploads/admin/article/'.$map['oldimg']);
    			//上传文件并且取得相应的文件名
    			$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = './Uploads/admin/article/'; // 设置附件上传根目录
//				$upload->savePath = ''; // 设置附件上传（子）目录
				$upload->autoSub=false;
				// 上传文件
				$info = $upload->upload();
				$map['img']=$info['img']['savename'];
    		}
    		$m=M("article");
    		$result=$m->save($map);
//  		echo "<pre>";
//  		var_dump($map);die;
    		if($result){
	    		$this->success("修改成功！");
	    	}else{
	    		$this->error("修改失败！");
	    	}
    	}else{
    		//接收id
	    	$id=I("get.id");
	    	$m=M("article");
	    	$result=$m->find($id);
	    	$this->assign("list",$result);
	    	//读取分类
	    	$type=M("type");
	    	$typelist=$type->select();
	    	$this->assign("typelist",$typelist);
	    	$this->display();
    	}
    }
    public function addArticle(){
    	if(IS_POST){
    		//先判断是否有文件上传
    		$post=I("post.");
    		if($_FILES['img']['size']>=0){
    			//上传文件并且取得相应的文件名
    			$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = './Uploads/admin/article/'; // 设置附件上传根目录
//				$upload->savePath = ''; // 设置附件上传（子）目录
				$upload->autoSub=false;
				// 上传文件
				$info = $upload->upload();
				$post['img']=$info['img']['savename'];
    		}
    		$post['addtime']=date("Y-m-d H:i:s");
    		$article=D("Article");
    		$create=$article->create($post);
    		if(!$create){
    			$this->error($article->getError());
    		}else{
    			$resulu=$article->addArticle($post);
    			if($resulu){
    				$this->success("添加文章成功！");
    			}else{
    				$this->error("添加文章失败！");
    			}
    		}
    	}
    }
}