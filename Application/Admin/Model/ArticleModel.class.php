<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model
{
	protected $_validate = array(
     array('title','require','标题不能为空'), //默认情况下用正则进行验证
     array('title','','标题不能重复',1,'unique',3), //默认情况下用正则进行验证
     array('content','require','内容不能为空'), //默认情况下用正则进行验证
     array('auth','require','作者不能为空'), //默认情况下用正则进行验证
   );
   public function addArticle($post){
   		$result=$this->add($post);
   		return $result;
   }
}