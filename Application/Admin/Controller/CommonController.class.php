<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
    	//先检测有没有登录
    	if(!isset($_SESSION['uinfo'])){
    		header("location:".U("Login/index"));
    	}else{
    		if($_SESSION['superadmin']!=1){
				if(CONTROLLER_NAME!='index'){
					$auth=new \Think\Auth();
	//				var_dump($auth->check(CONTROLLER_NAME."/".ACTION_NAME ,$_SESSION['uid']));die;
					if(!$auth->check(CONTROLLER_NAME."/".ACTION_NAME ,$_SESSION['uid'])){
						$this->error("抱歉，您没有权限操作");
					}
				}
			}
    	}
    }
    public function addindex(){
        $modules = 'Admin';  //模块名称
        $controller=$this->getController($modules);
        foreach($controller as $key=>$val){
        	if($val!="Common"){
        		$action=A($val);
        		$desc[]=$action->getDesc();
        	}
        }
        //更新数据表
        foreach($desc as $key=>$val){
        	foreach($val as $k=>$v){
        		foreach($v as $kk=>$vv){
       				$map['name']=$kk;
       				$map['title']=$vv;
       				$map['desc']=$val['desc'];
       				$name=M("authRule")->where("name='{$kk}'")->field("id,name")->find();
       				if($name){
       					$map['id']=['eq',$name['id']];
       					M("authRule")->save($map);
       				}else{
       					M("authRule")->add($map);
       				}
        		}
        	}
        }
        $this->success("更新成功！");
  	}
    protected function getController($module){
        if(empty($module)) return null;
        $module_path = APP_PATH . '/' . $module . '/Controller/';  //控制器路径
        if(!is_dir($module_path)) return null;
        $module_path .= '/*.class.php';
        $ary_files = glob($module_path);
        foreach ($ary_files as $file) {
            if (is_dir($file)) {
                continue;
            }else {
                $files[] = basename($file, C('DEFAULT_C_LAYER').'.class.php');
            }
        }
        return $files;
    }
}