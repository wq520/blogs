<?php
namespace Home\Widget;
use Think\Controller;
class RightWidget extends Controller {
	//热门文章
	public function index(){
		$list=M('Article')->limit(15)->select();
        $this->assign('list',$list);
        $this->display('Right:index');
	}
	//随机文章
	public function rand(){
		$Article = M("Article");
		$list = $Article->limit(10)->order('rand()')->select();
		$this->assign('list',$list);
        $this->display('Right:rand');
	}
	//推荐
	public function Recommend(){
		$Article = M("Article");
		$list = $Article->where("hot=1")->limit(4)->order('rand()')->select();
		$this->assign('list',$list);
        $this->display('Right:recommend');
	}
	//标签云
	public function tags(){
		$Article = M("Article");
		$list = $Article->where("hot=1")->field("id,keywords")->select();
		$tags=[];
		foreach($list as $key=>$val){
			if(empty($val['keywords'])){
				continue;
			}else{
				$tags[$key]['id']=$key;
				$tags[$key]['tags']=explode(",",$val['keywords']);
			}
		}
		$this->assign('tags',$tags);
        $this->display('Right:tags');
	}
	//最新解析记录
	public function newparse(){
		$m=M("parselog");
		$result=$m->limit(10)->order('id desc')->select();
		$this->assign("newparse",$result);
		$this->display('Right:newparse');
	}
}