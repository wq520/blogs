<?php
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
    public function index(){
    	
    }
    public function alipay(){
    	//获取参数
    	$tradeNo=I("post.tradeNo");
    	$Money=I("post.Money");
    	$description=I("post.title");
    	$Gateway=I("post.Gateway");
    	$memo=I("post.memo");
    	$data['Money']=$Money;
    	$data['description']=$description;
    	$data['Gateway']=$Gateway;
    	$data['memo']=$memo;
    	$data['tradeNo']=$tradeNo;
    	if($description){
    		$result=M("pay")->add($data);
	    	if($result){
	    		$this->success("订单成功！");
	    	}else{
	    		$this->error("订单失败！");
	    	}
    	}
    }
}