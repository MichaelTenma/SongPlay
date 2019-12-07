<?php header('Content-Type: text/html; charset=gbk');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<meta http-equiv="refresh" content="2">
</head>
    <body>
    <?php
    
		$nextSongName = $_GET['nextSongName'];
		$songListUrl = "checkNextSong.txt";
		getFile($songListUrl,$nextSongName);
		
    	function getFile($txtUrl,$nextSongName){
			$file = fopen($txtUrl, "r") or exit("Unable to open file!");
			$temp = fgets($file);
			$temp = str_replace("\r\n","",$temp);
			fclose($file);
			
			if($temp == "true"){
//				include 'lastTimeSong.php';
//				include 'songListPathSET.php';
//				$songClass = new Song($songsListUrl);
//				include 'server_b.php';
//				$lastTimeSong = new LastTimeSong($lastTimeSongUrl);
//				$time = "00:00";
//				$nextSongName = 
//				$lastTimeSong->writeFile($lastTimeSongUrl,$nextSongName,$time);
				//写入lastTimeSong.txt，达到切换歌曲的目的	
				//问题:歌名从何而来
				//解决方案：当用户切换歌曲时写入歌名，本页面只负责检查是否要切换歌曲
				
				$url = "server_a.php";
//				$url = "server_b.php?songName=" . $nextSongName;
				
				echo "<script language=\"javascript\" type=\"text/javascript\">";
         		echo "parent.location.href=\"$url\"; ";
    			echo "</script>";
    			$txt = "false";
    			include 'checkNextSong.php';
    			$checkNextSong = new CheckNextSong();
    			$checkNextSong->writeFile($txtUrl,$txt);//切换歌曲后，修改值，防止无限切换歌曲
			}
		}
		
		
//		function writeFile($txtUrl,$txt){
//			$newLine = "\r\n";
//			$myfile = fopen($txtUrl, "w") or die("Unable to open file!");
//			$txt .= $newLine;
//			fwrite($myfile,$txt);
//			fclose($myfile);
//		}
    ?>
    </body>
</html>