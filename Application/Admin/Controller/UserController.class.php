<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	//注释的方法
	public function getDesc(){
		$array=[
			'desc'=>'权限控制类',
			[
				'User/addRule'=>'添加规则',
				'User/addgroup'=>'添加规则组',
				'User/logout'=>'退出登录',
				'User/add'=>'添加管理员'
			]
		];
		return $array;
	}
    public function index(){
    	//管理员列表
    	$m=M("admin");
    	$res=$m->select();
    	$this->assign("list",$res);
    	$this->display();
    }
    public function add(){
    	if(IS_POST){
    		$post=I("post.");
			$post['password']=md5($post['password']);
    		//添加当前时间
    		$post['regtime']=date("Y-m-d H:i:s");
//  		var_dump($post);die;
    		//验证数据是否合法
    		$User = D("Admin"); // 实例化User对象
			if (!$User->create($post)){
			     // 如果创建失败 表示验证没有通过 输出错误提示信息
			     $this->error($User->getError());
			}else{
			     // 验证通过 可以进行其他数据操作
			    $res=$User->adduser($post);
    			if(!$res){
    				$this->error("添加失败！");
    			}else{
    				//添加用户成功之后立即更新用户组关联
    				$map['uid'] = $User->getLastInsID();;
    				$map['group_id']=I("post.group_id");
    				$m=M("authGroupAccess");
    				$result=$m->add($map);
    				if($result){
    					$this->success("添加成功！");
    				}else{
    					$this->error("添加失败！");
    				}
    			}
			}
    	}else{
    		$m=M("AuthGroup");
    		$res=$m->select();
    		$this->assign("list",$res);
    		$this->display();
    	}
   }
	public function group(){
		$m=M("AuthRule");
		$res=$m->select();
		$data=[];
		$new=[];
		foreach($res as $key=>$val){
			$data[]=explode("/",$val['name']);
		}
		foreach($data as $k=>$v){
			$new[]=$v[0];
		}
		//去除数组中重复的元素
		$new=array_unique($new);
		foreach($new as $k=>$v){
			$m=M("AuthRule");
			$map['name']=['like',"%{$v}%"];
			$list[]=$m->where($map)->group("name")->select();
		}
		foreach($list as $k=>$v){
			$newlist[]=$v;
		}
//		echo "<pre>";
//		var_dump($newlist);die;
		$this->assign("list",$newlist);
		$this->display();
	}
	//退出登录
	public function logout(){
		session_destroy();
		$this->success("退出成功!",U('Login/index'));
	}
}