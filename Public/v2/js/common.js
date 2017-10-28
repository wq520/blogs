layui.use('carousel', function(){
  var carousel = layui.carousel;
  //建造实例
  carousel.render({
    elem: '#banner'
    ,width: '100%' //设置容器宽度
    ,arrow: 'always' //始终显示箭头
    //,anim: 'updown' //切换动画方式
    ,height:'280'
    ,autoplay:true
    ,interval:2500
  });
});
//监听 如果是手机访问，则干掉轮播图
//获取屏幕的宽高
function wh(){
	var heigth=$(window).height();
	var width=$(window).width();
	var returnArray={'heigth':heigth,'width':width};
	return returnArray;
}
//执行监听的变化值
function goresize(){
	$(window).resize(function() {
	  if(wh()['width']<768){
			$("#banner").parent(".row").remove();
		}
	});
	if(wh()['width']<768){
		$("#banner").parent(".row").remove();
	}
}
goresize();