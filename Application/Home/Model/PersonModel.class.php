<?php
namespace Home\Model;
use Think\Model;
class PersonModel extends Model
{
	protected $_validate = array(
     array('code','require','验证码必须！'), //默认情况下用正则进行验证
     array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
     array('password','require','密码必填！'), // 在新增的时候验证name字段是否唯一
     array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
   );
   public function register($post){
   		$result=$this->add($post);
   		return $result;
   }
}
