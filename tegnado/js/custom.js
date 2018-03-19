jQuery(document).ready(function($) {
	
	$('.search-icon').click(function(){
		$('.search_btn').toggleClass('active');
		$('.main_body_content').toggleClass('active');
		$('.search_panel').toggleClass('active');
		$('html').toggleClass('lock-scroll');
		return false;
	});
		
	
	$.ajaxSetup({cache:false});
	$(".post-link").click(function(){
		var post_link = $(this).attr("href");
	
		$("#single-popup").html("content loading");
		$("#single-popup").load(post_link);
	return false;
	});
	
});	