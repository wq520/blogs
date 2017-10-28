<?php
namespace Admin\Model;
use Think\Model;
class AuthGroup extends Model
{
	protected $_validate = array(
     array('title','require','规则组描述必须！'), //默认情况下用正则进行验证
   );
}
