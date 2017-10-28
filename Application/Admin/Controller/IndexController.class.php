<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	//注释的方法
	public function getDesc(){
		$array=[
			'desc'=>'系统首页',
			[
				'Index/index'=>'系统首页'
			]
		];
		return $array;
	}
    public function index(){
    	$this->display();
    }
}