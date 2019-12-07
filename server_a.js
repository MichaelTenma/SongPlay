
//$(document).ready(function(){
	window.setInterval(getSong, 2000); 
//	$("text").text("abc");
//});
function getSong(nextSongNameValue){ 
	
//异步打开server_c.php

		    $.post("server_c.php",
		    {
		    	nextSongName:nextSongNameValue
		    },
		    function(data,status){
//		    	$("text").text("abc");
		      alert("数据：" + data + "\n状态：" + status);
		    });

	
	
//	获取歌曲信息
//	修改audio src
//alert("aaaaa"); 
} 