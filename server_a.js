
//$(document).ready(function(){
	window.setInterval(getSong, 2000); 
//	$("text").text("abc");
//});
function getSong(nextSongNameValue){ 
	
//�첽��server_c.php

		    $.post("server_c.php",
		    {
		    	nextSongName:nextSongNameValue
		    },
		    function(data,status){
//		    	$("text").text("abc");
		      alert("���ݣ�" + data + "\n״̬��" + status);
		    });

	
	
//	��ȡ������Ϣ
//	�޸�audio src
//alert("aaaaa"); 
} 