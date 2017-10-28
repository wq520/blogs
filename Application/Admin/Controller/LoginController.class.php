<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//注释的方法
	public function getDesc(){
		$array=[
			'desc'=>'权限控制类',
			[
				'Login/index'=>'登录页',
				'Login/login'=>'执行登录页',
				'Login/code'=>'验证码'
			]
		];
		return $array;
	}
    public function index(){
    	$this->display();
    }
    public function login(){
    	$post=I("post.");
		$username=$post['username'];
		$password=$post['password'];
		$code=$post['code'];
		if(!check_verify($code)){
			$this->error("验证码错误！");
		}else{
			$m=M("admin");
			$res=$m->where("user='{$username}'")->find();
			if($res){
				if(md5($password)==$res['password']){
					//存入session
					$_SESSION['uinfo']=$res;
					//存入id
					$_SESSION['uid']=$res['id'];
					if($res['user']=="admin"){
						//如果是超级会员，就给一个标识
						$_SESSION['superadmin']=1;
					}
					$this->success("登录成功！",U("Index/index"));
				}else{
					$this->error("密码错误！");
				}
			}else{
				$this->success("用户名错误！");
			}
		}
   }
    public	function code(){
		$Verify =     new \Think\Verify();
		$Verify->fontSize = 28;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->entry();
	}
}