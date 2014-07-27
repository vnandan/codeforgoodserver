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

	$('#submitChat').click(function(e){
		e.preventDefault();
		var text = $('#chatMessage').val();
		var form = $('#form1');
		if(text.length > 0) {
			$.ajax({
				url: '/codeforgoodserver/message/addMessage',
				method: 'POST',
				data: 'postId=' + form.post_id + 'message=' + text
			}).done(function(data){
				alert(data);
				// window.location.reload();
			}).fail(function(error){
				window.location.reload();
			});
		}
 	});
});