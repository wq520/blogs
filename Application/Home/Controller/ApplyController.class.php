<?php
namespace Home\Controller;
use Think\Controller;
class ApplyController extends Controller {
    public function index(){
		$this->display(); // 输出模板
    }
    //作者申请
    public function author(){
    	$post=I("post.");
    	//验证验证码是否正确
    	if(!check_verify($post['code'])){
    		$this->error("验证码错误！");
    	}else{
    		$author=M("message")->add($post);
    		if($author){
    			$this->success("申请已提交，请等待通知！",U('Index/index'));
    		}else{
    			$this->error("未知错误，请联系管理员！");
    		}
    	}
    }
}