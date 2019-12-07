<?php header('Content-Type: text/html; charset=gbk');
	include 'song.php';
	include 'songListPathSET.php';
	$songclass = new Song($songsListUrl);
	
	$songNameNo = $_GET['songName'];
	
	$songName =	$songclass->findSongName($songNameNo);
	$time = "00:00";
	$nextSongNameNo = "";
	
	//¼ÇÂ¼lastTimeSong¼ÇÂ¼
	//songName
	//time		
	include 'lastTimeSong.php';
	$lastTimeSong = new LastTimeSong($lastTimeSongUrl);
	$lastTimeSong->writeFile($lastTimeSongUrl,$songName,$time);
	
	$url = "server_a.php?songName=$songNameNo&time=$time&nextSongName=$nextSongNameNo";
	
	echo "
    <script language=\"javascript\" type=\"text/javascript\">
           window.location.href=\"$url\"; 
    </script>
		";
	
//	echo "SongName:" . $songName;
	
//	function writeFile($lastTimeSongUrl,$songName,$time){
//		$newLine = "\r\n";
//		$myfile = fopen($lastTimeSongUrl, "w") or die("Unable to open file!");
//		$txtArray = array($songName,$time);
//		for($i = 0;$i < 2;$i++){
//			$txt .= $txtArray[$i] . $newLine;	
//		}
//		fwrite($myfile,$txt);
//		fclose($myfile);
//	}
?>