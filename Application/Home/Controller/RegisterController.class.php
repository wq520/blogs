<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
		$this->display(); // 输出模板
    }
    public function register(){
    	//用户注册
    	//接收用户名
    	$post['name']=I("post.name","");
		$post['qq']=I("post.qq","");
    	$post['password']=I("post.password","");
    	$post['repassword']=I("post.repassword","");
    	$post['code']=I("post.code","");
    	$person=D("person");
    	//创建数据
    	if(!$person->create($post)){
    		$this->error($person->getError());
    	}else{
    		//检测验证码
    		if(!check_verify($post['code'])){
    			$this->error("验证码不正确");
    		}else{
    			$post['password']=md5($post['password']);
    			$post['score']=10;
    			$post['status']=0;
    			$post['ip']=   $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
    			$result=$person->register($post);
	    		if(!$result){
	    			$this->error("注册会员名出错，请联系管理员");
	    		}else{
	    			$this->success("恭喜你，注册成功，系统赠送你10积分！",U('Login/index'));
	    		}
    		}
    	}
    }
}