<?php
namespace Home\Controller;
use Think\Controller;
class VipController extends Controller {
    public function parse(){
		//获取当前用户的id
		$uid=$_SESSION['uinfo']['id'];
    	//查询当前用户的积分
		$user=M("person");
		$score=$user->where("id='{$uid}'")->find();
		$this->assign("score",$score);
		$this->display(); // 输出模板
    }
    //执行解析
    public function doParse(){
    		header("Content-type: text/html; charset=utf-8");// 设置文件的编码格式为utf-8
    		//判断当前会员是否已经登录
    		$message=[
    			'message'=>"初始化值！",
    			'status'=>6
    		];
    		if(!$_SESSION['uinfo']){
    			$message['message']="您还没有登录！";
         		 $this->ajaxReturn($message);
    		}else{
    			//获取当前用户的id
    			$uid=$_SESSION['uinfo']['id'];
    			$uname=$_SESSION['uinfo']['name'];
    			$parsetime=date("Y-m-d H:i:s");
    			//获取传递过来的素材地址
    			$scurl=I("post.scurl","");
    			if(!$scurl){
    				$message['message']="请先输入素材地址再解析！";
    				$message['status']=6;
    				$this->ajaxReturn($message);
    			}else{
    				$str1 = 'asdfFSDdda';
					$str2 = 'Fs';
					//strpos 大小写敏感  stripos大小写不敏感    两个函数都是返回str2 在str1 第一次出现的位置
					if(strpos($scurl,"588ku") !== false){//使用绝对等于
					    $message['message']="暂不支持千库解析！";
    					$message['status']=6;
    					$this->ajaxReturn($message);
					}else if(strpos($scurl,"nipic") !== false){
						$message['message']="暂不支持昵图解析！";
    					$message['status']=6;
    					$this->ajaxReturn($message);
					}else if(strpos($scurl,"888pic") !== false){
						$message['message']="暂不支持包图解析！";
    					$message['status']=6;
    					$this->ajaxReturn($message);
					}else if(strpos($scurl,"51yuansu") !== false){
						$message['message']="暂不支持觅元素解析！";
    					$message['status']=6;
    					$this->ajaxReturn($message);
					}else{
					    $url = "http://account.jyyye.com/outward";//接口地址
						 //初始化
						  $curl = curl_init();
						  //设置抓取的url
						  curl_setopt($curl, CURLOPT_URL, $url);
						  //设置头文件的信息作为数据流输出
						  curl_setopt($curl, CURLOPT_HEADER, 0);
						  //设置获取的信息以文件流的形式返回，而不是直接输出。
						  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						  //设置post方式提交
						 curl_setopt($curl, CURLOPT_POST, 1);
						 //设置post数据
						 $post_data = array ("user_name" => "2438955","user_pwd" => "4395","url"=>$scurl);
						 curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
						 //执行命令
						 $data = curl_exec($curl);
						 //关闭URL请求
						 curl_close($curl);
						  //显示获得的数据
						  $result=json_decode($data,true);
						  if($result['status']==0){
						  	  $ulog=M("parselog");
							  $after=$result['urlList'][0]?$result['urlList'][0]:$result['urlList'][1];
							  $map['uid']=$uid;
							  $map['name']=$uname;
							  $map['parsetime']=$parsetime;
							  $map['type']=$scurl;
							  $map['after']=$after;
							  $ulog->add($map);
						  }
				  		$this->ajaxReturn($result);
					}
    			}
    		}
    }
    public function picparse(){
    	header("Content-type: text/html; charset=gbk");// 设置文件的编码格式为utf-8
    	$post=I("post.scurl");
    	$code=I("post.code");
    	if(!check_verify($code)){
    		$this->ajaxReturn($this->result(400,'您输入的验证码不正确'));
    	}
    	if(!$_SESSION['uinfo']){
    		$this->ajaxReturn($this->result(400,'请先登录之后再操作！'));
    	}
        $url="http://ppt.sihege.com/API/58pic.php?url=".$post;
        // $url="http://ppt.sihege.com/API/58pic.php?url=http://www.58pic.com/newpic/26902988.html";
	    $ch  = curl_init($url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //返回数据不直接输出
	    $content = curl_exec($ch);                //执行并存储结果
	    curl_close($ch); 
	    $this->ajaxReturn($this->result(200,'素材解析成功！',$content));
    }
    public function result($code,$msg,$array){
    	$data['code']=$code;
    	$data['msg']=$msg;
    	$data['data']=$array;
    	return $data;
    }
}