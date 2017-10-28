<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
		$this->display(); // 输出模板
    }
    //用户登录
    public function login(){
    	$name=I("post.name","");
    	$password=I("post.password","");
    	$post['code']=I("post.code","");
    	//根据用户名查询
    	$person=M("person");
    	if(!check_verify($post['code'])){
    		$this->error("验证码不正确！");
    	}else{
    		$checkName=$person->where("name='{$name}'")->find();
	    	if(!$checkName){
	    		$this->error("用户名错误！");
	    	}else{
	    		if($checkName['password']!=md5($password)){
	    			$this->error("密码错误！");
	    		}else{
	    			//如果用户和密码都匹配
	    			if($checkName['status']!=1){
	    				$this->error("你的账户未激活，请联系管理员为你激活！");
	    			}else{
	    				//登录成功！
	    				$_SESSION['usession']=md5($checkName);
	    				$_SESSION['uinfo']=$checkName;
	    				$this->success("登录成功！",U('Index/index'));
	    			}
	    		}
	    	}
    	}
    }
    //验证码
    public	function code(){
		$Verify =     new \Think\Verify();
		$Verify->fontSize = 28;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->entry();
	}
	//退出登录
	public function outlog(){
		session_destroy();
		$this->success("成功退出！");
	}
}