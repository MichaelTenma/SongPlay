<?php header('Content-Type: text/html; charset=gbk');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<script src="jquery-1.11.1.min.js">
</script>
<script>
	function post(value){
		if(value != ""){	
    	$.post("control_b.php",
	   			{command:value},
	   			function(data,status){
	    			$("div").html("SongName��" + data + "<br>");
	    		}
	    	);
		}
	}
	$(document).ready(function(){
				post("201");
			  $('#lastSongButton').click(function(){
				  post("200");
				 });
			  $('#nextSongButton').click(function(){
				  post("201");
			  });
	});
</script>


<title>Lindont music control</title>
</head>
<!--
	1.�����ǰ����
	2.����赥
	3.����ָ��
-->
    <body>
    <div></div>
	
    
    <button id="lastSongButton">��һ��</button><br>
    <button id="nextSongButton">��һ��</button>
<!--    <a href="control_b.php?command=200" target="view_window">��һ��</a><br>-->
<!--	<a href="control_b.php?command=201" target="view_window">��һ��</a>-->
<!--
	2����contrl
	01������һ��
	00������һ��
	-->
    </body>
</html>