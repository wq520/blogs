<?php
	namespace Admin\Controller;
	use Think\Controller;
	class AuthController extends Controller
	{
		//注释的方法
		public function getDesc(){
			$array=[
				'desc'=>'权限控制类',
				[
					'Auth/addRule'=>'添加规则',
					'Auth/addgroup'=>'添加规则组'
				]
			];
			return $array;
		}
		public function addRule(){
			$post=I("post.");
			$m=D("AuthRule");
			$res=$m->create($post);
			if(!$res){
				$this->error($m->getError());
			}else{
				$res=$m->add($post);
				if($res>0){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		/**
	     * @note 添加规则组
	     */
		public function addgroup(){
			$post=I("post.");
			$rules=$post['rules'];
			$rules=implode(",",$rules);
			$post['rules']=$rules;
			$m=D("AuthGroup");
			$res=$m->create();
			if(!$res){
				$this->error($m->getError());
			}else{
				$res=$m->add($post);
				if($res>0){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		/**
	     * @note 删除规则
	     */
		public function del(){
			$getId=I("get.id","trim");
			$m=M("AuthRule");
			$res=$m->where("id='{$getId}'")->delete();
			if($res<0){
				$this->error("删除失败！");
			}else{
				$m=M("AuthGroup");
				$res=$m->where("rules='{$getId}'")->delete();
				if($res<0){
					$this->error("删除失败！");
				}else{
					$m=M("AuthGroupAccess");
					$res=$m->where("group_id='{$getId}'")->delete();
					if($res<0){
						$this->error("删除失败！");
					}else{
						$this->success("删除成功！");
					}
				}
			}
		}
	}
