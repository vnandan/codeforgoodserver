$(document).ready(function(){
	var currentSelectedTab=$('.dashboard-tabs .active a').attr('href');
	currentSelectedTab=currentSelectedTab.substring(1);
	console.info(currentSelectedTab);
	var temp;
	$('.dashboard-tab-content').each(function(index){
		temp=$(this).attr('id');
		if(temp!=currentSelectedTab){
			$(this).css({display:"none"});
		}});
	$('.dashboard-tabs li').click(function(){
		var tab=$(this).find('a').attr('href');
		$("#"+currentSelectedTab).css({display:"none"});
		currentSelectedTab=tab.substring(1);
		$("#"+currentSelectedTab).css({display:"block"});
		$('.dashboard-tabs .active').removeClass('active');
		$(this).addClass('active');
		$(".content").getNiceScroll().resize();
		return false;
	});
});