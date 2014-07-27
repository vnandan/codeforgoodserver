
<html>
<head>
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
	     $('#graph').hide();
	     $('#close').hide();
	});
</script>
</head>
<body>
<button id="close" style="bottom:0 ; right:0" >close</button>
<iframe id="graph" height="400" width = "600" ></iframe>
<a href="#" id="camChat" >Cam Chat</a>

<script src="camChat.js"></script> 
<script>


    $('#camChat').click(function(){
    	var randomLink = linkGenerate();
    	//$('<iframe />').attr('src',randomLink).appentTo('body');
    	$('#close').show();
    	$('#graph').attr('src', randomLink);
    	$('#graph').show();
    	$("#graph").css({"position":"fixed", "bottom":"0","right":"0","background-color": "white"});
        //var newwindow=window.open(randomLink,'','height=200,width=150');
        /*if (window.focus) {
        	newwindow.focus()
        	console.log("done");
        }*/
        //return false;
    
});

    $('#close').click(function(){
    	//var randomLink = linkGenerate();
    	//$('<iframe />').attr('src',randomLink).appentTo('body');
    	
    	$('#graph').attr('src', "");
    	$('#graph').hide();
    	$('close').hide();
    	$("#graph").css({"position":"fixed", "bottom":"0","right":"0","background-color": "white"});
        //var newwindow=window.open(randomLink,'','height=200,width=150');
        /*if (window.focus) {
        	newwindow.focus()
        	console.log("done");*/
        });
        //return false;
    
</script> 
</body>
</html>
