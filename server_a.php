<?php header('Content-Type: text/html; charset=gbk');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>Lindont music</title>
<!--<script type="text/javascript" src="server_a.js"></script>-->
<script src="jquery-1.11.1.min.js"></script>
<script type="text/javascript">

//$(document).ready(function(){
//	
//window.setInterval(getSong, 2000); 
////$("text").text("abc");
//});
function getSong(){ 

//�첽��server_c.php

		var value = $("songName#songNameRecord").attr("value");
		nextSongNameValue = value;
    	$.post("server_c.php",
	   			{nextSongName:nextSongNameValue},
	   			function(data,status){
		   			if(data != ""){
		   				var array = data.split("@?@");
		   				if (array[0].substr(0,1)==' ') array[0]=array[0].substr(1);//����ǰ������֮�ո�ע��ȥ��������404
		   				var linkSong = <?php include 'songListPathSET.php';echo "'$songsUrl'";?> + array[0];
		   				$("audio#player").attr("src",linkSong);

		   				$("songName#songNameRecord").attr("value",array[2]);
//		   				$("audio#player").ended="true";
		   				//��¼����		
//		    			$("div#text").html("SongName��" + array[0] + "<br>" + "time��" + array[1] + "<br>" + "nextSongName��" + array[2] + "<br>");
		   			}
	    		}
	    	);
//��ȡ������Ϣ
//�޸�audio src
} 

</script>

</head>

    <body>
    <?php
	$songName = $_GET['songName'];
	$time = $_GET['time'];
	$nextSongName = $_GET['nextSongName'];
	include 'songListPathSET.php';
	include 'song.php';
	$songClass = new Song($songsListUrl);
	
//	echo "songName:$songName<br>time:$time<br>nextSongName:$nextSongName<br>";
	
	if(empty($songName) != true && empty($time) != true && empty($nextSongName) != true){
		
//		$songName = "egoist - �����ƥ�� (ŷ߯����) [mqms2](1).mp3";
		
		$songName = $songClass->findSongName($songName);
//		$nextSongName = $songClass->findSongName($nextSongName);
		
		echo "<audio id=\"player\" src=\"$songsUrl" . $songName . "\" controls=\"controls\" autoplay=\"autoplay\" onended=\"window.location.href='server_b.php?songName=". $nextSongName ."';\">";
//		echo "<source id='player' src=\"$songsUrl" . $songName . "\" type=\"audio/mpeg\" />";
		echo "�����������֧�ָò�����������������������";
		echo "</audio><br>";
		
		
		echo "<songName id='songNameRecord' value='$nextSongName'></songName>";
		echo "<script type=\"text/javascript\">";
		
//		echo "window.setInterval(\"getSong('". $nextSongName ."')\", 2000);";
		echo "window.setInterval(getSong, 2000);";
		//nextSongNameҪ����ˢ�¸ı�
		//��$nextSongName�ŵ�ĳһ��Ԫ���У�ÿ��ִ��getSong����ʱ��ȡһ��songName
		//Ȼ��ı�ú�����ֵ				
		echo "</script>";

		
		echo "<div id='text'></div>";
		
		
		
//		echo "<iframe src=\"newfile.php?nextSongName=" . $nextSongName . "\" frameBorder=\"0\" width=\"900\" scrolling=\"no\" height=\"90\"></iframe>";
		
		//�Ӷ��ҳ�治�ϼ���Ƿ����checkNextSong.txt�����Ҽ��ֵ�Ƿ�Ϊtrue
		//���Ϊtrue�������ҳ����ת		
		
//		include 'audioPlayer.html';
		
//		echo "songName:$songName<br>time:$time<br>nextSongName:$nextSongName";
		// ?songName=abc.mp3&time=00:11&nextSongName=cba.mp3
	}else{
		
		include 'lastTimeSong.php';
		$lastTimeSong = new LastTimeSong("lastTimeSong.txt");
		$songListArray = $lastTimeSong->readList();
		$time = "00:00";
		
		if($songListArray != false){
			$time = $songListArray[1];
		}else{
			$songListArray = $songClass->getSongListArray();
		}
		
		$songName = $songListArray[0];
//		echo $time . "<br>";
//		echo "songName:" . $songName . "<br>";
//		$nextSongName = "egoist - �����ƥ�� (ŷ߯����) [mqms2](1).mp3";
		
		
		$nextSongName = $songClass->findNextSongName($songName);
//		echo "nextSongName:$nextSongName<br>";
		
		$songNameNo = $songClass->findSongNameNo($songName);
		$nextSongNameNo = $songClass->findSongNameNo($nextSongName);
		
//		echo "songNameNo:$songNameNo<br>nextSongNameNo:$nextSongNameNo<br>";
		
		$url = "server_a.php?songName=$songNameNo&time=$time&nextSongName=$nextSongNameNo";

		echo "<script language=\"javascript\" type=\"text/javascript\">
           window.location.href=\"$url\"; </script>";
	//��Ϊ������ԭ���޷���ת,���������������ת��������	
	}
	?>
    </body>
</html>