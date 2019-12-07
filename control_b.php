<?php
	//修改lastTimeSong.txt的内容，songName,time
	//修改checkNextSong.txt为true
	
	$command = $_POST['command'];
//	if (empty($command)){
//		$command = "201";
//	}
		include 'lastTimeSong.php';
		include 'songListPathSET.php';
		include 'song.php';
		
		$lastTimesong = new LastTimeSong($lastTimeSongUrl);
		$songListArray = $lastTimesong->readList();
		$songClass = new Song($songsListUrl);
		
		$songName = $songListArray[0];
		$time = $songListArray[1];
		
//		echo "command:" . $command . "<br>";
		
		if($command == "200"){
			$songName = $songClass->findLastSongName($songName);
		}else if($command == "201"){
			$songName = $songClass->findNextSongName($songName);
		}
		
		$lastTimesong->writeFile($lastTimeSongUrl, $songName, $time);
		
		$txt = "true";
		$txtUrl = "checkNextSong.txt";
 	   include 'checkNextSong.php';
 	   $checkNextSong = new CheckNextSong();
  	  $checkNextSong->writeFile($txtUrl,$txt);//切换歌曲后，修改值，防止无限切换歌曲
    
 	   echo $songName;


?>