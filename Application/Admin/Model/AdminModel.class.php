<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model
{
	protected $_validate = array(
     array('user','require','用户名必填',1,"unique",1), //默认情况下用正则进行验证
     array('password','require','密码必填'), //默认情况下用正则进行验证
   );
   public function adduser($post){
   		$result=$this->add($post);
   		return $result;
   }
}
