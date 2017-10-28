<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends Controller {
    public function index(){
    	
    }
    public function me(){
		$title="张超个人简历，只想做与众不同！";
		$this->assign('title',$title);// 输出标题
    	$this->display();
    }
}