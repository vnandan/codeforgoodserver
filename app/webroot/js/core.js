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

	$('#completeButton').click(function(e){
		var postid = $(this).attr('postid');
		var result = confirm('Are you sure you want to complete this post ?');
		if(result == true) {
			window.location.href = '/codeforgoodserver/posts/complete/'+postid;
		}
	});

	$('#submitChat').click(function(e){
		e.preventDefault();
		var text = $('#chatMessage').val();
		var postId = $('#postId').val();
		if(text.length > 0) {
			$.ajax({
				url: '/codeforgoodserver/messages/add/' + text + '/' + postId,
				method: 'POST'
			}).done(function(data){
				//alert(data);
				window.location.reload();
			}).fail(function(error){
				window.location.reload();
			});
		}
 	});
});