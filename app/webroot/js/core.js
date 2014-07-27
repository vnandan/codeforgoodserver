$(document).ready(function(){
	$('#flashMessage').click(function(e){
		$(this).fadeOut(200);
	});

	$('#dropButton').click(function(e){
		var postid = $(this).attr('postid');
		var result = confirm('Are you sure you want to drop this post ?');
		if(result == true) {
			window.location.href = '/codeforgoodserver/posts/drop/'+postid;
		}
	});
});