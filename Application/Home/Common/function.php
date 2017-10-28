<?php
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}
//获取父级分类
function getChildren($pid){
	$map['pid']=['eq',$pid];
	$type=M("type")->where($map)->select();
	return $type;
}
//获取3偏置顶文章
function zhiding(){
	$article=M("article")->where("style=1")->order("id desc")->limit(4)->select();
	return $article;
}
//获取热门文章
function hotarticle(){
	$article=M("article")->order("click desc")->limit(5)->select();
	return $article;
}

//获取3偏精选文章
function jingxuan(){
	$article=M("article")->where("style=2")->order("id desc")->limit(4)->select();
	return $article;
}
//统计文章总数
function articleCount(){
	$article=M("article")->select();
	return count($article);
}
//统计会员
function countMember(){
	$article=M("person")->select();
	return count($article);
}
function bootstrap_page_style($page_html){
    if ($page_html) {
        $page_show = str_replace('<div>','<nav><ul class="pagination">',$page_html);
        $page_show = str_replace('</div>','</ul></nav>',$page_show);
        $page_show = str_replace('<span class="current">','<li class="active"><a>',$page_show);
        $page_show = str_replace('</span>','</a></li>',$page_show);
        $page_show = str_replace(array('<a class="num"','<a class="prev"','<a class="next"','<a class="end"','<a class="first"'),'<li><a',$page_show);
        $page_show = str_replace('</a>','</a></li>',$page_show);
    }
    return $page_show;
}