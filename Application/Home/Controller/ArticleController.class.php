<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
    	//获取文章id
    	$aid=I("aid",0,"0");
    	//查询对应的文章
    	$m=M("Article");
    	$m->where("id='{$aid}'")->setInc('click',3);
    	$list=$m->where("id='{$aid}'")->find();
		C("title",$list['title']);//设置标题
    	$this->assign("list",$list);
		$this->display(); // 输出模板
    }
    //文章搜索
    public function search(){
    	//获取参数
    	$search=I("search");
    	$m=M("article");
    	$map['title']=['like',"%".$search."%"];
		$count = $m->where($map)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $m->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		var_dump($list);
//		$this->assign('list',$list);// 赋值数据集
//		$this->assign('page',$show);// 赋值分页输出
//		$this->display(); // 输出模板
    }
    public function lst(){
    	$title="张超技术博客，一个野生PHPer的生活方式！";
    	//获取分类id
    	$aid=I("id");
    	$map['type']=['eq',$aid];
    	$Article = M('Article'); // 实例化User对象
		$count = $Article->where($map)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show= bootstrap_page_style($Page->show());// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Article->where($map)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
		//查询分类
		$type=M("type");
		$typelist=$type->select();
		foreach($list as $key=>&$val){
			foreach($typelist as $k=>$v){
				if($val['type']==$v['id']){
	    			C("description",$v['desc']);
	    			C("title",$v['name']);
					$val['type']=$v['name'];
				}
			}
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('title',$title);// 输出标题
    	$this->display("Article/list");
    }
}