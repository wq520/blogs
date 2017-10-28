<?php
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model
{
	protected $_validate = array(
     array('name','require','分类名不能为空'), //默认情况下用正则进行验证
     array('name','','分类名不能重复',1,'unique',3), //默认情况下用正则进行验证
   );
   public function addType($post){
   		$result=$this->add($post);
   		return $result;
   }
}