<?php header('Content-Type: text/html; charset=gbk');
    
		$nextSongName = $_POST['nextSongName'];
		$songListUrl = "checkNextSong.txt";
		getFile($songListUrl,$nextSongName);
		
    	function getFile($txtUrl,$nextSongName){
			$file = fopen($txtUrl, "r") or exit("Unable to open file!");
			$temp = fgets($file);
			$temp = str_replace("\r\n","",$temp);
			fclose($file);
			
			if($temp == "true"){
				//��ȡsongName��server_a
				$time = "00:00";
				include 'song.php';
				include 'songListPathSET.php';
				
				$songClass = new Song($songsListUrl);
				$songName = $songClass->findSongName($nextSongName);
				$nextSongName = $songClass->findNextSongName($songName);
				
				$txt = "false";
    			include 'checkNextSong.php';
    			$checkNextSong = new CheckNextSong();
    			$checkNextSong->writeFile($txtUrl,$txt);//�л��������޸�ֵ����ֹ�����л�����	
				
    			$nextSongName = $songClass->findSongNameNo($nextSongName);
    			
    			
    			$data = array(
					"songName" => $songName,
					"time" => $time,
					"nextSongName" => $nextSongName
				);

				echo "$songName@?@$time@?@$nextSongName";
			}
		}

?>