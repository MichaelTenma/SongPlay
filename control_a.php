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
	    			$("div").html("SongName：" + data + "<br>");
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
	1.输出当前歌名
	2.输出歌单
	3.处理指令
-->
    <body>
    <div></div>
	
    
    <button id="lastSongButton">上一曲</button><br>
    <button id="nextSongButton">下一曲</button>
<!--    <a href="control_b.php?command=200" target="view_window">上一曲</a><br>-->
<!--	<a href="control_b.php?command=201" target="view_window">下一曲</a>-->
<!--
	2代表contrl
	01代表下一曲
	00代表上一曲
	-->
    </body>
</html>